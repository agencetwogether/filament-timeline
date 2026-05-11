<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\TextEntry;

class TimelineDescriptionEntry extends TextEntry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineDescriptionEntry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
