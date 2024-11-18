<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;

trait HasShowMore
{
    protected int|Closure|null $showItemsCount = null;

    protected string|Closure|null $showMoreLabel = null;

    protected string|Closure|null $showMoreIcon = null;

    protected string|Closure|null $showMoreColor = null;

    public function showItemsCount(int|Closure $items): static
    {
        $this->showItemsCount = $items;

        return $this;
    }

    public function showMoreLabel(string|Closure $label): static
    {
        $this->showMoreLabel = $label;

        return $this;
    }

    public function showMoreIcon(string|Closure|null $icon = null): static
    {
        $this->showMoreIcon = $icon;

        return $this;
    }

    public function showMoreColor(string|Closure $color): static
    {
        $this->showMoreColor = $color;

        return $this;
    }

    public function getShowItemsCount(): ?int
    {
        $showItemsCount = $this->evaluate($this->showItemsCount);

        if ($showItemsCount == 0) {
            return null;
        }

        return $showItemsCount;
    }

    public function getShowMoreLabel(): string
    {
        return $this->evaluate($this->showMoreLabel) ?? __('filament-timeline::filament-timeline.show_more.label');
    }

    public function getShowMoreIcon(): ?string
    {
        return $this->evaluate($this->showMoreIcon);
    }

    public function getShowMoreColor(): string
    {
        return $this->evaluate($this->showMoreColor) ?? 'gray';
    }
}
