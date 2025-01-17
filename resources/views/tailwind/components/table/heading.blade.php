@props([
    'column',
    'sortable' => null,
    'direction' => null,
    'text' => null,
])

<th
    {{ $attributes->merge(['class' => 'px-3 py-2 md:px-6 md:py-3 bg-cool-gray-50'])->only('class') }}
>
    @unless ($sortable)
        <span class="block text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
            {{ $text ?? $slot }}
        </span>
    @else
        <button
            wire:click="sortBy('{{ $column }}', '{{ $text ?? $column }}')"
            {{ $attributes->except('class') }}
            class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider group focus:outline-none focus:underline"
        >
            <span>{{ $text ?? $slot }}</span>

            <span class="relative flex items-center">
                @if ($direction === 'asc')
                    <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                @elseif ($direction === 'desc')
                    <div class="opacity-0 group-hover:opacity-100 absolute">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                        </svg>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                @else
                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                    </svg>
                @endif
            </span>
        </button>
    @endif
</th>
