<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Filament\Infolists\Components\IconEntry;

class ItemIcon extends IconEntry
{
    use Concerns\CanAnimate;
    use Concerns\HasIdentifier;

    protected string $viewIdentifier = 'itemIcon';

    protected string $view = 'filament-timeline::infolists.components.item-icon';
}
