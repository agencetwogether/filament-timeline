<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\TextEntry;

class TimelineFooterEntry extends TextEntry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineFooterEntry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
