<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Components\Concerns\HasEmptyState;
use Filament\Infolists\Components\RepeatableEntry;

class TimelineRepeatableEntry extends RepeatableEntry
{
    use HasEmptyState;

    protected string $view = 'filament-timeline::timeline-repeatable-entry';

    protected function setup(): void
    {
        parent::setup();

        $this->hiddenLabel();
    }

    public function getAllowedChildComponents(): array
    {
        return [
            TimelineTitleEntry::class,
            TimelineDescriptionEntry::class,
            TimelineIconEntry::class,
            TimelineActionEntry::class,
            TimelineDateEntry::class,
            TimelineFooterEntry::class,
        ];
    }
}
