<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Agencetwogether\FilamentTimeline\Enums\IconAnimation;
use Closure;

trait CanAnimate
{
    protected IconAnimation|string|Closure|null $animation = null;

    public function animation(IconAnimation|string|Closure|null $animation): static
    {
        $this->animation = $animation;

        return $this;
    }

    public function getAnimation(mixed $state): IconAnimation|string|null
    {
        return $this->evaluate($this->animation, [
            'state' => $state,
        ]);
    }
}
