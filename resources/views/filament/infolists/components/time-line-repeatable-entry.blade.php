@php
    use Illuminate\View\ComponentAttributeBag;$isContained = $isContained();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
            {{
                $attributes
                    ->merge([
                        'id' => $getId(),
                    ], escape: false)
                    ->merge($getExtraAttributes(), escape: false)
                    ->class([
                        'fi-in-repeatable',
                        'fi-contained' => $isContained,
                    ])
            }}
    >
        @if (count($childComponentContainers = $getChildComponentContainers()))
            <ol class="relative ms-3 before:absolute before:start-0 before:top-8 before:bottom-0 before:w-px before:bg-gray-200 dark:before:bg-gray-700">
                @foreach ($childComponentContainers as $container)
                    <li
                            @class([
                                'relative mb-4 ms-6',
                                'fi-in-repeatable-item block',
                                'rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10' => $isContained,
                            ])
                    >
                        <div
                            {{
                                (new ComponentAttributeBag)
                                    ->grid($getGridColumns())
                                    ->class(['fi-in-repeatable-items gap-2'])
                            }}
                        >
                            {{ $container }}
                        </div>
                    </li>
                @endforeach
            </ol>
        @elseif (($placeholder = $getPlaceholder()) !== null)
            <x-filament-infolists::entry-wrapper>
                {{ $placeholder }}
            </x-filament-infolists::entry-wrapper>
        @endif
    </div>
</x-dynamic-component>
