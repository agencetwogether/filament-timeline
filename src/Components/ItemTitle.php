<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Filament\Infolists\Components\Concerns\HasColor;
use Filament\Infolists\Components\Concerns\HasWeight;
use Filament\Infolists\Components\Entry;

class ItemTitle extends Entry
{
    use Concerns\CanFormatState;
    use Concerns\HasIdentifier;
    use Concerns\HasSize;
    use HasColor;
    use HasWeight;

    protected string $viewIdentifier = 'itemTitle';

    protected string $view = 'filament-timeline::infolists.components.item-title';
}
