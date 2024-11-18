<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

trait HasIdentifier
{
    public function getViewIdentifier(): string
    {
        return $this->viewIdentifier;
    }
}
