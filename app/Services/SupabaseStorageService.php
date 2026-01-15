<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class SupabaseStorageService
{
    protected string $projectUrl;
    protected string $serviceKey;
    protected string $bucket;

    public function __construct()
    {
        $this->projectUrl = config('services.supabase.url');
        $this->serviceKey = config('services.supabase.service_key');
        $this->bucket = config('services.supabase.bucket');

        if (!$this->projectUrl || !$this->serviceKey || !$this->bucket) {
            throw new RuntimeException('Supabase config is not properly set.');
        }
    }

    /**
     * Upload file to Supabase Storage
     * Return only the file path (not URL)
     */
    public function upload(UploadedFile $file, string $path): string
    {
        // Pastikan path bersih
        $path = ltrim($path, '/');

        $url = rtrim($this->projectUrl, '/')
            . '/storage/v1/object/'
            . $this->bucket
            . '/'
            . $path;

        $stream = fopen($file->getRealPath(), 'r');

        $response = Http::withOptions([
            'verify' => app()->environment('local') ? false : true,
        ])->withHeaders([
            'Authorization' => "Bearer {$this->serviceKey}",
        ])->withBody(
            $stream,
            $file->getMimeType()
        )->put($url);

        fclose($stream);

        if (! $response->successful()) {
            throw new \RuntimeException(
                'Supabase upload failed: ' . $response->body()
            );
        }

        return $path; // 👈 BALIKIN PATH YANG SAMA
    }




    /**
     * Delete file from Supabase Storage
     */
    public function delete(string $path): bool
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->serviceKey}",
        ])->delete(
            "{$this->projectUrl}/storage/v1/object/{$this->bucket}/{$path}"
        );

        return $response->successful();
    }
}
