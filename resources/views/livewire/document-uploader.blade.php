<div class="grid grid-cols-3 gap-4">
    @foreach (['assetCriteria', 'availability', 'system'] as $type)
        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
            <div>
                <div class="text-xl font-medium text-black mb-5">{{ ucfirst($type) }}</div>
                <form wire:submit.prevent="upload{{ ucfirst($type) }}">
                    <input type="file" name="document" wire:model="{{ $type }}">
                    <button type="submit" class="px-4 py-2 mt-2 text-white bg-primary-600 rounded">Upload</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<script>
    window.addEventListener('alert', (event) => {
        window.livewire.on('alert', data => {
            alert(data.message);
        });
    })
</script>
