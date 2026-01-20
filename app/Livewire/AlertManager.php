<?php

namespace App\Livewire;

use Livewire\Component;

class AlertManager extends Component
{
    public $alerts = [];

    protected $listeners = ['alert' => 'alert'];

    public function alert($data)
    {
        $alert = [
            'id' => uniqid(),
            'type' => $data['type'] ?? 'info',
            'title' => $data['title'] ?? '',
            'message' => $data['message'] ?? '',
            'show' => true
        ];

        $this->alerts[] = $alert;

        // Dispatch browser event to hide alert after 5 seconds
        $this->dispatch('hide-alert', ['id' => $alert['id']]);
    }

    public function hideAlert($alertId)
    {
        $this->alerts = array_filter($this->alerts, function($alert) use ($alertId) {
            return $alert['id'] !== $alertId;
        });

        // Re-index array
        $this->alerts = array_values($this->alerts);
    }

    public function render()
    {
        return view('livewire.alert-manager');
    }
}
