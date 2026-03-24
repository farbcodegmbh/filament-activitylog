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
            <ol class="m-0 list-none p-0">
                @foreach ($childComponentContainers as $container)
                    <li
                            @class([
                                'relative block pb-6 ps-12 last:pb-0 before:absolute before:bottom-0 before:start-4 before:top-8 before:w-px before:bg-gray-200 dark:before:bg-gray-700 [&>.fi-in-repeatable-items>.fi-sc>.fi-grid-col:first-child]:absolute [&>.fi-in-repeatable-items>.fi-sc>.fi-grid-col:first-child]:start-0 [&>.fi-in-repeatable-items>.fi-sc>.fi-grid-col:first-child]:top-0 [&>.fi-in-repeatable-items>.fi-sc>.fi-grid-col:first-child]:w-0 [&>.fi-in-repeatable-items>.fi-sc>.fi-grid-col:first-child]:h-0',
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
