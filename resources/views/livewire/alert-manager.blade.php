<div>
    @foreach($alerts as $alert)
        <x-alert
            :type="$alert['type']"
            :title="$alert['title']"
            :message="$alert['message']"
            :show="$alert['show']"
        />
    @endforeach
</div>