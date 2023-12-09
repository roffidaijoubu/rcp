@props(['submit'])

<div {{ $attributes->merge(['class' => 'lg:grid lg:grid-cols-3 lg:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 lg:mt-0 lg:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 bg-base-300 text-base-content sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="flex flex-col gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 pt-3 pb-6 bg-base-300 text-base-content text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
