<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;
use Illuminate\Contracts\Support\Htmlable;

trait HasEmptyState
{
    protected string|Htmlable|Closure|null $emptyStateDescription = null;

    protected string|Htmlable|Closure|null $emptyStateHeading = null;

    protected string|Closure|null $emptyStateIcon = null;

    public function emptyStateDescription(string|Htmlable|Closure|null $description): static
    {
        $this->emptyStateDescription = $description;

        return $this;
    }

    public function emptyStateHeading(string|Htmlable|Closure|null $heading): static
    {
        $this->emptyStateHeading = $heading;

        return $this;
    }

    public function emptyStateIcon(string|Closure|null $icon): static
    {
        $this->emptyStateIcon = $icon;

        return $this;
    }

    public function getEmptyStateDescription(): string|Htmlable|null
    {
        return $this->evaluate($this->emptyStateDescription);
    }

    public function getEmptyStateHeading(): string|Htmlable
    {
        return $this->evaluate($this->emptyStateHeading) ?? __('filament-timeline::filament-timeline.empty-state.heading');
    }

    public function getEmptyStateIcon(): string
    {
        return $this->evaluate($this->emptyStateIcon)
            ?? 'heroicon-o-x-mark';
    }
}
