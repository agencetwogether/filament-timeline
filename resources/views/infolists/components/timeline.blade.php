@php
    use function Filament\Support\prepare_inherited_attributes;
    use function Filament\Support\get_color_css_variables;
    $isAside = $isAside();
@endphp

<x-filament-timeline::timeline-section
    :aside="$isAside"
    :collapsed="$isCollapsed()"
    :collapsible="$isCollapsible() && (! $isAside)"
    :compact="$isCompact()"
    :content-before="$isContentBefore()"
    :description="$getDescription()"
    :footer-actions="$getFooterActions()"
    :footer-actions-alignment="$getFooterActionsAlignment()"
    :header-actions="$getHeaderActions()"
    :heading="$getHeading()"
    :icon="$getIcon()"
    :icon-color="$getIconColor()"
    :icon-size="$getIconSize()"
    :persist-collapsed="$shouldPersistCollapsed()"
    :attributes="
        prepare_inherited_attributes($attributes)
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)
            ->merge($getExtraAlpineAttributes(), escape: false)
    "
>
    @php
        $childComponentContainers = $getChildComponentContainers();
    @endphp

    @if (count($childComponentContainers = $getChildComponentContainers()) && count($childComponentContainers[0]->getComponents()) > 0)
        @php
            $childItemsCount = count($childComponentContainers);
            $showItemsCount = $getShowItemsCount() ?? $childItemsCount;
            $timelineColor = $getTimelineColor();
        @endphp

        <div
            x-data="{ childItemsCount: @js($childItemsCount), showItemsCount: @js($showItemsCount), totalShowItemsCount: @js($showItemsCount) }"
            @class([
                'space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:to-transparent',
                match ($timelineColor) {
                    'gray' => 'before:via-slate-300',
                    default => 'before:via-custom-300',
                },
            ])
            @style([
                get_color_css_variables($timelineColor, shades: [300]) => $timelineColor !== 'gray',
            ])
        >
            @foreach ($childComponentContainers as $index => $container)

                @php
                    $itemComponents = [
                        'itemIcon' => null,
                        'itemTitle' => null,
                        'itemDate' => null,
                        'itemDescription' => null,
                        'itemAction' => null,
                    ];

                    foreach ($container->getComponents() as $component) {
                        if (!method_exists($component,'getViewIdentifier')) {
                            throw new Exception('Instance of '.get_class($component).' is not accepted in Timeline Component, please remove it and use only ' . implode(', ', $getAllowedChildComponents()). ' as child components');
                        }
                        $viewIdentifier = $component->getViewIdentifier();

                        if (array_key_exists($viewIdentifier, $itemComponents)) {
                            $itemComponents[$viewIdentifier] = $component;
                        }
                    }
                    extract($itemComponents);
                @endphp

                <div
                    x-show="@js($index) < totalShowItemsCount"
                    x-collapse :key="@js(rand())"
                    class="relative"
                >
                    <div class="md:flex items-center md:space-x-4 mb-3">
                        <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                            <!-- Icon -->
                            @if($itemIcon)
                                {{ $itemIcon }}
                            @else
                                <div
                                    class="flex w-10 h-10 justify-center items-center border rounded-full bg-white dark:bg-gray-800 border-gray-100 dark:border-gray-700 shadow md:order-1">
                                    <div class="w-2 h-2 bg-primary-600 rounded-full dark:bg-primary-400"></div>
                                </div>
                            @endif
                            <!-- Date -->
                            <div class="md:w-28">
                                @if($itemDate)
                                    {{ $itemDate }}
                                @else
                                    No Date entry is set
                                @endif
                            </div>
                        </div>
                        <!-- Title -->
                        <div class="ml-14 flex flex-wrap justify-between items-center md:w-full">
                            <h3>
                                @if($itemTitle)
                                    {{ $itemTitle }}
                                @else
                                    No Title entry is set
                                @endif
                            </h3>
                            <!-- Action -->
                            @if ($itemAction)
                                <div class="gap-3 flex flex-wrap items-center justify-start">
                                    {{ $itemAction }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Description Card -->
                    {{ $itemDescription }}
                </div>
            @endforeach
            <div
                x-show="totalShowItemsCount < childItemsCount"
            >
                @php
                    $icon = $getShowMoreIcon();
                    $label = $getShowMoreLabel();
                    $color = $getShowMoreColor();
                @endphp
                <x-filament::link
                    x-on:click="totalShowItemsCount += showItemsCount"
                    :icon="$icon"
                    :color="$color"
                    @class([
                        'cursor-pointer hover:underline',
                        'ml-[.7rem] md:ml-[8.25rem]' => $icon,
                        'ml-[1rem] md:ml-[8.4rem]' => !$icon,
                    ])>
                    {{ $label }}
                </x-filament::link>
            </div>
        </div>
    @else
        <x-filament-timeline::empty-state
            :heading="$getEmptyStateHeading()"
            :description="$getEmptyStateDescription()"
            :icon="$getEmptyStateIcon()"
        />
    @endif
</x-filament-timeline::timeline-section>
