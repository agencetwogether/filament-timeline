<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\IconEntry;

class TimelineIconEntry extends IconEntry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineIconEntry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
