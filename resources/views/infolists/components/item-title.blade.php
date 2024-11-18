@php
    use function Filament\Support\get_color_css_variables;
    use Filament\Support\Enums\FontWeight;
    use Filament\Infolists\Components\TextEntry\TextEntrySize;
    $color = $getColor($getState());
    $weight = $getWeight($getState());
    $size = $getSize($getState());
    $url = $getUrl();
@endphp
<span @class([
        match ($color) {
            null => 'text-gray-950 dark:text-white',
            'gray' => 'text-gray-500 dark:text-gray-400',
            default => 'text-custom-600 dark:text-custom-400',
        },
        match ($size) {
            TextEntrySize::ExtraSmall, 'xs' => 'text-xs',
            TextEntrySize::Small, 'sm' => 'text-sm leading-6',
            TextEntrySize::Medium, 'base', 'md' => 'text-base',
            TextEntrySize::Large, 'lg', null => 'text-lg',
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
        get_color_css_variables(
            $color,
            shades: [400, 600],
            alias: 'infolists::components.text-entry.item.label',
        ) => ! in_array($color, [null, 'gray']),
    ])>
    @if($getState())
        @if($url)
            <a class="hover:underline" href="{{ $url }}">{{ $formatState($getState()) }}</a>
        @else
            {{ $formatState($getState()) }}
        @endif

    @elseif (($placeholder = $getPlaceholder()) !== null)
        <x-filament-infolists::entries.placeholder>
            {{ $placeholder }}
        </x-filament-infolists::entries.placeholder>
    @endif
</span>
