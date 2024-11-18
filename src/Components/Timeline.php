<?php

namespace Agencetwogether\FilamentTimeline\Components;

use Agencetwogether\FilamentTimeline\Concerns;
use Filament\Infolists\ComponentContainer;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Section
{
    use Concerns\HasEmptyState;
    use Concerns\HasShowMore;
    use Concerns\HasTimelineColor;

    protected string $view = 'filament-timeline::infolists.components.timeline';

    /**
     * @return array<ComponentContainer>
     */
    public function getChildComponentContainers(bool $withHidden = false): array
    {
        if ((! $withHidden) && $this->isHidden()) {
            return [];
        }

        $containers = [];

        foreach ($this->getState() ?? [] as $itemKey => $itemData) {
            $container = $this
                ->getChildComponentContainer()
                ->getClone()
                ->statePath($itemKey)
                ->inlineLabel(false);

            if ($itemData instanceof Model) {
                $container->record($itemData);
            }

            $containers[$itemKey] = $container;
        }

        return $containers;
    }

    public function getAllowedChildComponents(): array
    {
        return [
            ItemAction::class,
            ItemDate::class,
            ItemDescription::class,
            ItemIcon::class,
            ItemTitle::class,
        ];
    }
}
