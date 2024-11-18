<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;
use Filament\Infolists\Components\TextEntry\TextEntrySize;

trait HasSize
{
    protected TextEntrySize|string|Closure|null $size = null;

    public function size(TextEntrySize|string|Closure|null $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getSize(mixed $state): TextEntrySize|string|null
    {
        return $this->evaluate($this->size, [
            'state' => $state,
        ]);
    }
}
