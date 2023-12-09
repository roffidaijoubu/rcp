<div {{ $attributes->merge(['class' => 'lg:grid lg:grid-cols-3 lg:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 lg:mt-0 lg:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-base-300 shadow sm:rounded-lg">
            {{ $content }}
        </div>
    </div>
</div>
