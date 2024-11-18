<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Filament\Infolists\Components\Entry;

class ItemAction extends Entry
{
    use Concerns\HasAction;
    use Concerns\HasIdentifier;

    protected string $viewIdentifier = 'itemAction';

    protected string $view = 'filament-timeline::infolists.components.item-action';
}
