@props([
    'description' => null,
    'heading',
    'icon',
])

<div {{ $attributes->class(['px-6 py-12']) }}>
    <div class="grid max-w-lg mx-auto text-center justify-items-center">
        <div class="p-3 mb-4 bg-gray-100 rounded-full dark:bg-gray-500/20">
            <x-filament::icon
                :icon="$icon"
                class="w-6 h-6 text-gray-500 dark:text-gray-400"/>
        </div>

        <h4
            {{ $attributes->class(['text-base font-semibold leading-6 text-gray-950 dark:text-white']) }}>
            {{ $heading }}
        </h4>

        @if ($description)
            <p
                {{ $attributes->class(['text-sm text-gray-500 dark:text-gray-400']) }}>
                {{ $description }}
            </p>
        @endif
    </div>
</div>
