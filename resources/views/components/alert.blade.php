@props(['type' => 'success', 'message' => null, 'duration' => 3000])

<div class="alert alert-{{ $type }} mb-4" role="alert"
     x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, {{ $duration }})"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    @if($message)
        {!! $message !!}
    @else
        {{ $slot }}
    @endif
</div>
