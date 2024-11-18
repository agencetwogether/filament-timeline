<?php

namespace Agencetwogether\FilamentTimeline\Concerns;

use Closure;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\HtmlString;

trait HasAction
{
    protected bool|Closure $isGrouped = false;

    protected string $defaultGroupIcon = 'heroicon-m-ellipsis-vertical';

    //Label
    protected string|Htmlable|Closure|null $groupLabel = null;

    protected bool $shouldTranslateGroupLabel = false;

    public function translateGroupLabel(bool $shouldTranslateGroupLabel = true): static
    {
        $this->shouldTranslateGroupLabel = $shouldTranslateGroupLabel;

        return $this;
    }

    public function groupLabel(string|Htmlable|Closure|null $label): static
    {
        $this->groupLabel = $label;

        return $this;
    }

    public function getGroupLabel(): string
    {
        $label = $this->evaluate($this->groupLabel) ?? __('filament-actions::group.trigger.label');

        return $this->shouldTranslateGroupLabel ? __($label) : $label;
    }

    //Tooltip
    protected string|Closure|null $groupTooltip = null;

    public function groupTooltip(string|Closure|null $tooltip): static
    {
        $this->groupTooltip = $tooltip;

        return $this;
    }

    public function getGroupTooltip(): ?string
    {
        return $this->evaluate($this->groupTooltip);
    }

    //Dropdown Placement
    protected string|Closure|null $groupDropdownPlacement = null;

    public function groupDropdownPlacement(string|Closure|null $placement): static
    {
        $this->groupDropdownPlacement = $placement;

        return $this;
    }

    public function getGroupDropdownPlacement(): ?string
    {
        return $this->evaluate($this->groupDropdownPlacement);
    }

    //Icon
    protected string|Closure|null $iconGroup = null;

    protected IconPosition|string|Closure|null $groupIconPosition = null;

    public function groupIcon(string|Closure|null $icon): static
    {
        $this->iconGroup = $icon;

        return $this;
    }

    public function getGroupIcon(): ?string
    {
        return $this->getBaseIcon() ?? FilamentIcon::resolve('actions::action-group') ?? $this->defaultGroupIcon;
    }

    public function getBaseIcon(): string|Htmlable|null
    {
        $icon = $this->evaluate($this->iconGroup);

        // https://github.com/filamentphp/filament/pull/13512
        if ($icon instanceof Renderable) {
            return new HtmlString($icon->render());
        }

        return $icon;
    }

    public function groupIconPosition(IconPosition|string|Closure|null $position): static
    {
        $this->groupIconPosition = $position;

        return $this;
    }

    public function getGroupIconPosition(): IconPosition|string
    {
        return $this->evaluate($this->groupIconPosition) ?? IconPosition::Before;
    }

    //Color
    /**
     * @var string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | Closure | null
     */
    protected string|array|Closure|null $groupColor = null;

    /**
     * @param  string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | Closure | null  $color
     */
    public function groupColor(string|array|Closure|null $color): static
    {
        $this->groupColor = $color;

        return $this;
    }

    /**
     * @return string | array{50: string, 100: string, 200: string, 300: string, 400: string, 500: string, 600: string, 700: string, 800: string, 900: string, 950: string} | null
     */
    public function getGroupColor(): string|array|null
    {
        return $this->evaluate($this->groupColor) ?? 'primary';
    }

    //Size
    protected ActionSize|string|Closure|null $groupSize = null;

    public function groupSize(ActionSize|string|Closure|null $size): static
    {
        $this->groupSize = $size;

        return $this;
    }

    public function getGroupSize(): ActionSize|string|null
    {
        return $this->evaluate($this->groupSize) ?? ActionSize::Medium;
    }

    //Outlined
    protected bool|Closure $groupIsOutlined = false;

    public function groupOutlined(bool|Closure $condition = true): static
    {
        $this->groupIsOutlined = $condition;

        return $this;
    }

    public function isGroupOutlined(): bool
    {
        return (bool) $this->evaluate($this->groupIsOutlined);
    }

    //Button
    protected bool $triggerGroupButton = false;

    public function triggerGroupButton(bool $condition = true): static
    {
        $this->triggerGroupButton = $condition;
        $this->groupIcon = null;

        return $this;
    }

    public function isTriggerGroupButton(): bool
    {
        return (bool) $this->evaluate($this->triggerGroupButton);
    }

    //Link
    protected bool $triggerGroupLink = false;

    public function triggerGroupLink(bool $condition = true): static
    {
        $this->triggerGroupLink = $condition;

        return $this;
    }

    public function isTriggerGroupLink(): bool
    {
        return (bool) $this->evaluate($this->triggerGroupLink);
    }

    //IconButton
    protected bool $triggerGroupIconButton = false;

    public function triggerGroupIconButton(bool $condition = true): static
    {
        $this->triggerGroupIconButton = $condition;

        return $this;
    }

    public function isTriggerGroupIconButton(): bool
    {
        return (bool) $this->evaluate($this->triggerGroupIconButton);
    }

    //Badge
    protected bool $triggerGroupBadge = false;

    public function triggerGroupBadge(bool $condition = true): static
    {
        $this->triggerGroupBadge = $condition;

        return $this;
    }

    public function isTriggerGroupBadge(): bool
    {
        return (bool) $this->evaluate($this->triggerGroupBadge);
    }

    //Group
    public function group(bool|Closure $condition = true): static
    {
        $this->isGrouped = $condition;

        return $this;
    }

    public function isGrouped(): bool
    {
        return (bool) $this->evaluate($this->isGrouped);
    }
}
