<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Closure;
use Filament\Infolists\Components\Concerns\HasColor;
use Filament\Infolists\Components\Concerns\HasWeight;
use Filament\Infolists\Components\Entry;
use Filament\Infolists\Infolist;
use Illuminate\Support\Carbon;

class ItemDate extends Entry
{
    use Concerns\CanBeBadge;
    use Concerns\CanFormatState;
    use Concerns\HasIdentifier;
    use Concerns\HasSize;
    use HasColor;
    use HasWeight;

    protected string $viewIdentifier = 'itemDate';

    protected string $view = 'filament-timeline::infolists.components.item-date';

    public function date(string|Closure|null $format = null, ?string $timezone = null): static
    {
        $this->isDate = true;

        $format ??= Infolist::$defaultDateDisplayFormat;

        $this->formatStateUsing(static function (ItemDate $component, $state) use ($format, $timezone): ?string {
            if (blank($state)) {
                return null;
            }

            return Carbon::parse($state)
                ->setTimezone($timezone ?? $component->getTimezone())
                ->translatedFormat($component->evaluate($format));
        });

        return $this;
    }
}
