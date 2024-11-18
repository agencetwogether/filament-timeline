<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;

trait HasTimelineColor
{
    protected string|Closure|null $timelineColor = null;

    public function timelineColor(string|Closure $color): static
    {
        $this->timelineColor = $color;

        return $this;
    }

    public function getTimelineColor(): string
    {
        return $this->evaluate($this->timelineColor) ?? 'primary';
    }
}
