<?php

namespace Agencetwogether\FilamentTimeline\Components\Concerns;

trait HasIdentifier
{
    public function getViewIdentifier(): string
    {
        return $this->viewIdentifier;
    }
}
