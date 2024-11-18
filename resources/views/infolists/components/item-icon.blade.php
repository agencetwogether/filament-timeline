@php
    use Agencetwogether\FilamentTimeline\Enums\IconAnimation;
    use Filament\Infolists\Components\IconEntry\IconEntrySize;
    use function Filament\Support\get_color_css_variables;
@endphp
@if ($icon = $getIcon($getState()))
    @php
        $color = $getColor($getState()) ?? 'gray';
        $animation = $getAnimation($getState());
        $size = $getSize($getState()) ?? IconEntrySize::Medium;
    @endphp
    
    <div @class([
            'flex w-10 h-10 justify-center items-center dark:border rounded-full dark:bg-gray-800 dark:border-gray-700 shadow md:order-1',
            match ($color) {
                'gray' => 'bg-gray-100',
                default => 'fi-color-custom bg-custom-100',
            },
    ]) @style([
            get_color_css_variables($color, shades: [100, 800]) => $color !== 'gray',
        ])>
        <x-filament::icon :icon="$icon" @class([
        match ($animation) {
                IconAnimation::Spin, 'spin' => 'animate-spin',
                IconAnimation::Ping, 'ping' => 'animate-ping',
                IconAnimation::Pulse, 'pulse' => 'animate-pulse',
                IconAnimation::Bounce, 'bounce' => 'animate-bounce',
                default => $animation,
            },
                match ($size) {
                    IconEntrySize::ExtraSmall, 'xs' => 'h-3 w-3',
                    IconEntrySize::Small, 'sm' => 'h-4 w-4',
                    IconEntrySize::Medium, 'md' => 'h-5 w-5',
                    IconEntrySize::Large, 'lg' => 'h-6 w-6',
                    IconEntrySize::ExtraLarge, 'xl' => 'h-7 w-7',
                    IconEntrySize::TwoExtraLarge, '2xl' => 'h-8 w-8',
                    default => $size,
                },
                match ($color) {
                    'gray' => 'text-gray-400 dark:text-gray-500',
                    default => 'text-custom-500 dark:text-custom-400',
                },
            ]) @style([
                get_color_css_variables($color, shades: [400, 500]) => $color !== 'gray',
            ]) />
    </div>
@endif
