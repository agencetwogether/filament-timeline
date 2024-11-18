<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Filament\Infolists\Components\Concerns\HasColor;
use Filament\Infolists\Components\Concerns\HasWeight;
use Filament\Infolists\Components\Entry;

class ItemDescription extends Entry
{
    use Concerns\CanFormatState;
    use Concerns\HasIdentifier;
    use Concerns\HasSize;
    use HasColor;
    use HasWeight;

    protected string $viewIdentifier = 'itemDescription';

    protected string $view = 'filament-timeline::infolists.components.item-description';
}
