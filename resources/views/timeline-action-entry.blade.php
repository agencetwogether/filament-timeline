<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$timelineActionEntry"
>
    <x-filament-actions::group :actions="$getActions()" />
</x-dynamic-component>
