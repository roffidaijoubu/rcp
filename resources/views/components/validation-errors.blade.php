@if ($errors->any())
    <div {{ $attributes }}>
        {{-- <div class="font-medium text-red-600 dark:text-red-400">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 text-sm text-red-600 dark:text-red-400">
            
        </ul> --}}
        @foreach ($errors->all() as $error)
            <div class="w-full bg-error text-white/80 rounded-sm px-3 py-2">
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif
