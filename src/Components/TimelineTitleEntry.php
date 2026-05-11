<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\TextEntry;

class TimelineTitleEntry extends TextEntry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineTitleEntry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
