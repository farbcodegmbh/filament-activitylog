<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        {{
            $attributes
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-in-text w-full'])
        }}
    >

        {{ $getModifiedState() }}

    </div>
</x-dynamic-component>
