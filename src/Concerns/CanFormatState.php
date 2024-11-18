<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;
use Filament\Infolists\Components\Concerns\CanFormatState as BaseCanFormatState;

trait CanFormatState
{
    use BaseCanFormatState;

    protected bool|Closure $isProse = false;

    public function isProse(): bool
    {
        return (bool) $this->evaluate($this->isProse);
    }
}
