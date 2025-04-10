@error($field)
    <div class="absolute bottom-full left-0 mb-1 bg-red-300 text-white text-xs font-medium px-2 py-1 rounded-md shadow-sm z-10">
        <i class="bi bi-exclamation-triangle mr-1"></i>
        {{ $message }}
    </div>
@enderror