@foreach (session('flash_notification', collect())->toArray() as $message)
    <div id="alert" class="alert alert-{{ $message['level'] }} centered" role="alert">
        <span class="block sm:inline">{!! $message['message'] !!}</span>
    </div>
@endforeach

{{ session()->forget('flash_notification') }}
