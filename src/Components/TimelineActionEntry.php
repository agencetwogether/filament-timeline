<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\Entry;

class TimelineActionEntry extends Entry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineActionEntry';

    protected string $view = 'filament-timeline::timeline-action-entry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
