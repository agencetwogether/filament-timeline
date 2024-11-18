@php
    use function Filament\Support\get_color_css_variables;
    use Filament\Support\Enums\FontWeight;
    use Filament\Infolists\Components\TextEntry\TextEntrySize;
    $color = $getColor($getState());
    $weight = $getWeight($getState());
    $size = $getSize($getState());
    $url = $getUrl();
    $isBadge = $isBadge();
@endphp
<div>
    @if($getState())
        @if ($isBadge)
            <x-filament::badge
                :color="$color"
            >
                {{ $formatState($getState()) }}
            </x-filament::badge>
        @else
            <time @class([
                        match ($color) {
                            'gray', null => 'text-gray-500 dark:text-gray-400',
                            default => 'text-custom-600 dark:text-custom-400',
                        },
                        match ($size) {
                            TextEntrySize::ExtraSmall, 'xs' => 'text-xs',
                            TextEntrySize::Small, 'sm', null => 'text-sm leading-6',
                            TextEntrySize::Medium, 'base', 'md' => 'text-base',
                            TextEntrySize::Large, 'lg' => 'text-lg',
                            default => $size,
                        },
                        match ($weight) {
                            FontWeight::Thin, 'thin' => 'font-thin',
                            FontWeight::ExtraLight, 'extralight' => 'font-extralight',
                            FontWeight::Light, 'light' => 'font-light',
                            FontWeight::Medium, 'medium' => 'font-medium',
                            FontWeight::SemiBold, 'semibold' => 'font-semibold',
                            FontWeight::Bold, 'bold' => 'font-bold',
                            FontWeight::ExtraBold, 'extrabold' => 'font-extrabold',
                            FontWeight::Black, 'black' => 'font-black',
                            default => $weight,
                        },
                    ])
                @style([
                    get_color_css_variables($color, shades: [400, 600], alias: 'infolists::components.text-entry.item.label') => ! in_array($color, [null, 'gray']),
                ])>
                {{ $formatState($getState()) }}
            </time>
        @endif
    @elseif (($placeholder = $getPlaceholder()) !== null)
        <x-filament-infolists::entries.placeholder>
            {{ $placeholder }}
        </x-filament-infolists::entries.placeholder>
    @endif
</div>
