<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasIdentifier;
use Filament\Infolists\Components\TextEntry;

class TimelineDateEntry extends TextEntry
{
    use HasIdentifier;

    protected string $viewIdentifier = 'timelineDateEntry';

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel();

    }
}
