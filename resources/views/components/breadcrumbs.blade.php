<div>
    <ol class="flex items-center whitespace-nowrap min-w-0">
        @foreach ($items as $item)
            <li class="text-[0.813rem] ps-[0.5rem]">
                @if ($item['url'] && !$item['active'])
                    <a href="{{ $item['url'] }}" class="flex items-center text-primary hover:text-primary dark:text-primary truncate">
                        {{ $item['label'] }}
                        <i class="ti ti-chevrons-right flex-shrink-0 text-[#8c9097] dark:text-white/50 px-[0.5rem] overflow-visible rtl:rotate-180"></i>
                    </a>
                @else
                    <span class="text-[0.813rem] text-defaulttextcolor font-semibold hover:text-primary dark:text-[#8c9097] dark:text-white/50 {{ $item['active'] ? 'aria-current=page' : '' }}">
                        {{ $item['label'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</div>