<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.edit');

?>


<x-dashboard-layout>
    <div class="container mx-auto">


        <form action="/audit/{{ $audit->id }}/info" method="POST">
            @csrf
            @method('POST')

            <div class=" mt-5 p-6 bg-base-200 rounded-lg shadow">
                <h1 class="
                    text-3xl font-bold w-full mb-3
                ">
                    Editing Audit ID {{ $audit->id }}
                </h1>
                <div class="grid grid-cols-1 gap-6">

                    {{-- <div>
                        <x-label for="name" :value="__('Name')" />
                        <input id="name" class="input input-bordered block mt-1 w-full" type="text" name="name"
                            value="{{ $audit->name }}" required autofocus />
                    </div> --}}
                    <div>
                        <x-label for="year" :value="__('Year')" />
                        <input id="year" class="input input-bordered block mt-1 w-full" type="number"
                            name="year" value="{{ $audit->year }}" required autofocus />
                    </div>

                    <div>
                        <x-label for="satker" :value="__('Satker')" />
                        {{-- {{$audit->satker}} --}}
                        <select id="satker" class="select select-bordered block mt-1 w-full" name="satker"
                            value="{{ $audit->satker }}" required>
                            <option value="SOR1">SOR1</option>
                            <option value="SOR2">SOR2</option>
                            <option value="SOR3">SOR3</option>
                            <option value="SOR4">SOR4</option>
                            <option value="SSWJ">SSWJ</option>
                        </select>
                    </div>

                    <div>
                        <x-label for="area" :value="__('Area')" />
                        {{-- {{$audit->area}} --}}
                        <select id="area" class="select select-bordered block mt-1 w-full" name="area"
                            value="{{ $audit->area }}" required>
                            <!-- You will need to populate these options dynamically based on the selected 'satker' -->
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-outline"
                        wire:navigate>
                        {{ __('Back') }}
                    </a>
                    <button type="submit" class="btn ml-4 btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-dashboard-layout>

<script>
    var areaOptions = {
        'SOR1': ['TARGET','BATAM', 'DUMAI', 'LAMPUNG', 'MEDAN', 'PALEMBANG', 'PEKANBARU'],
        'SOR2': ['TARGET','BEKASI', 'BOGOR', 'CILEGON', 'CIREBON', 'JAKARTA', 'KARAWANG', 'TANGERANG'],
        'SOR3': ['TARGET','PASURUAN', 'SEMARANG', 'SIDOARJO', 'SURABAYA'],
        'SOR4': ['TARGET','BALIKPAPAN', 'BANJARMASIN', 'KUTAI', 'PALU', 'SAMARINDA', 'TARAKAN'],
        'SSWJ': ['TARGET','AOJBB', 'AOL', 'AOSS']
    };
</script>
<script>
    function initFormOptions() {
        var defaultSatker = "{{ $audit->satker }}";

        if (defaultSatker) {
            document.getElementById('satker').value = defaultSatker;
        }

        updateAreaOptions();
    }

    function updateAreaOptions() {

        var selectedSatker = document.getElementById('satker').value;
        var areaSelect = document.getElementById('area');

        var defaultArea = "{{ $audit->area }}";


        // Clear current options
        areaSelect.innerHTML = '';

        // Add new options
        areaOptions[selectedSatker].forEach(function(area) {
            var option = document.createElement('option');
            option.value = area;
            option.text = area;
            // Set the default area as selected
            if (area === defaultArea) {
                option.selected = true;
            }
            areaSelect.appendChild(option);
        });
    }

    document.getElementById('satker').addEventListener('change', updateAreaOptions);

    document.addEventListener('livewire:navigated', initFormOptions);
</script>
