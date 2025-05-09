@props(['type' => 'success', 'message'])

<div class="alert alert-{{ $type }} mb-4" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    {{ $message }}
</div>
