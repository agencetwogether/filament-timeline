@php
    $isContained = $isContained();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        {{
            $attributes
                ->merge([
                    'id' => $getId(),
                ], escape: false)
                ->merge($getExtraAttributes(), escape: false)
                ->class([
                    'fi-in-repeatable',
                    'rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10' => $isContained,
                ])
        }}
    >
        @if (count($childComponentContainers = $getChildComponentContainers()) &&
             count($childComponentContainers[0]->getComponents()) > 0)
            <ol
                class="relative space-y-8 before:absolute before:inset-0 before:ml-5 before:h-full before:w-0.5 before:-translate-x-px before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent md:before:ml-[8.75rem] md:before:translate-x-0"
            >
                @foreach ($childComponentContainers as $index => $container)
                    @php
                        $itemComponents = [
                            'timelineIconEntry' => null,
                            'timelineTitleEntry' => null,
                            'timelineFooterEntry' => null,
                            'timelineDescriptionEntry' => null,
                            'timelineActionEntry' => null,
                            'timelineDateEntry' => null,
                        ];

                        foreach ($container->getComponents() as $component) {

                            if (! method_exists($component, 'getViewIdentifier')) {
                                throw new Exception('Instance of ' . get_class($component) . ' is not accepted in Timeline Component, please remove it and use only ' . implode(', ', $getAllowedChildComponents()) . ' as child components');
                            }

                            $viewIdentifier = $component->getViewIdentifier();

                            if (array_key_exists($viewIdentifier, $itemComponents)) {
                                $itemComponents[$viewIdentifier] = $component;
                            }
                        }
                        extract($itemComponents);
                    @endphp

                    <li class="relative">
                        <div class="mb-3 items-center md:flex md:space-x-4">
                            <div
                                class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse"
                            >
                                <!-- Icon -->
                                <div
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-white shadow md:order-1"
                                >
                                    @if ($timelineIconEntry)
                                        {{ $timelineIconEntry }}
                                    @else
                                        <svg
                                            class="fill-emerald-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                        >
                                            <path
                                                d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"
                                            ></path>
                                        </svg>
                                    @endif
                                </div>
                                <!-- Date -->
                                <time class="md:w-28">
                                    {{ $timelineDateEntry }}
                                </time>
                            </div>
                            <!-- Title -->
                            <div
                                class="flex w-full justify-between pl-14 md:p-0"
                            >
                                @if ($timelineTitleEntry)
                                    {{ $timelineTitleEntry }}
                                @else
                                        No Title entry is set
                                @endif

                                @if ($timelineActionEntry)
                                    {{ $timelineActionEntry }}
                                @endif
                            </div>
                        </div>
                        <!-- Card -->
                        <x-filament::section class="ml-14 md:ml-44">
                            @if ($timelineFooterEntry)
                                <x-slot name="footer">
                                    {{ $timelineFooterEntry }}
                                </x-slot>
                            @endif

                            @if ($timelineDescriptionEntry)
                                {{ $timelineDescriptionEntry }}
                            @endif
                        </x-filament::section>
                    </li>
                @endforeach
            </ol>
        @else
            <x-filament::empty-state
                :description="$getEmptyStateDescription()"
                :heading="$getEmptyStateHeading()"
                :icon="$getEmptyStateIcon()"
                icon-color="gray"
            />
        @endif
    </div>
</x-dynamic-component>
