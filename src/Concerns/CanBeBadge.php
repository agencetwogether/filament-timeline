<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;

trait CanBeBadge
{
    protected bool|Closure $isBadge = false;

    public function badge(bool|Closure $condition = true): static
    {
        $this->isBadge = $condition;

        return $this;
    }

    public function isBadge(): bool
    {
        return (bool) $this->evaluate($this->isBadge);
    }
}
