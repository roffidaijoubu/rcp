<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.create');
?>

<x-dashboard-layout>

    <div class="container mx-auto">
        <form action="/audit/create" method="POST">
            @csrf
            @method('POST')

            <div class=" mt-5 p-6 bg-base-200 rounded-lg shadow">
                <h1 class="text-3xl font-bold w-full mb-3">
                    Create New Audit
                </h1>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <x-label for="year" :value="__('Year')" />
                        <input id="year" class="input input-bordered block mt-1 w-full" type="number" name="year" required autofocus />
                    </div>
                    <div>
                        <x-label for="satker" :value="__('Satker')" />
                        <select id="satker" class="select select-bordered block mt-1 w-full" name="satker" required>
                            <option value="" selected disabled>--Pilih Satker--</option>
                            <option value="SOR1">SOR1</option>
                            <option value="SOR2">SOR2</option>
                            <option value="SOR3">SOR3</option>
                            <option value="SOR4">SOR4</option>
                            <option value="SSWJ">SSWJ</option>
                        </select>
                    </div>
                    </div>
                    <div>
                        <x-label for="area" :value="__('Area')" />
                        <select id="area" class="select select-bordered block mt-1 w-full" name="area" required>
                            <!-- You will need to populate these options dynamically based on the selected 'satker' -->
                        </select>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('audits') }}" class="btn btn-primary btn-outline" wire:navigate>
                        {{ __('Back') }}
                    </a>
                    <button type="submit" class="btn ml-4 btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-dashboard-layout>

<script>
    var areaOptions = {
        'SOR1': ['BATAM', 'DUMAI', 'LAMPUNG', 'MEDAN', 'PALEMBANG', 'PEKANBARU'],
        'SOR2': ['BEKASI', 'BOGOR', 'CILEGON', 'CIREBON', 'JAKARTA', 'KARAWANG', 'TANGERANG'],
        'SOR3': ['PASURUAN', 'SEMARANG', 'SIDOARJO', 'SURABAYA'],
        'SOR4': ['BALIKPAPAN', 'BANJARMASIN', 'KUTAI', 'PALU', 'SAMARINDA', 'TARAKAN'],
        'SSWJ': ['AOJBB', 'AOL', 'AOSS']
    };

    function updateAreaOptions() {
        var selectedSatker = document.getElementById('satker').value;
        var areaSelect = document.getElementById('area');

        // Clear current options
        areaSelect.innerHTML = '';

        // Add new options
        areaOptions[selectedSatker].forEach(function(area) {
            var option = document.createElement('option');
            option.value = area;
            option.text = area;
            areaSelect.appendChild(option);
        });
    }

    document.getElementById('satker').addEventListener('change', updateAreaOptions);

    document.addEventListener('DOMContentLoaded', updateAreaOptions);
</script>
