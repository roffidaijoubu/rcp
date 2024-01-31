<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.targets.create');
?>

<x-dashboard-layout>

    <div class="container mx-auto">
        <form action="/audit/create" method="POST">
            @csrf
            @method('POST')

            <div class=" mt-5 p-6 bg-base-200 rounded-lg shadow">
                <h1 class="text-3xl font-bold w-full mb-3">
                    Create New Target
                </h1>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <x-label for="year" :value="__('Year')" />
                        <input id="year" class="input input-bordered block mt-1 w-full" type="number" name="year" required autofocus />
                    </div>
                    <div>
                        <x-label for="satker" :value="__('Satker')" />
                        <select id="satker" class="select select-bordered block mt-1 w-full" name="satker" required>
                            <option value="SOR1">SOR1</option>
                            <option value="SOR2">SOR2</option>
                            <option value="SOR3">SOR3</option>
                            <option value="SOR4">SOR4</option>
                            <option value="SSWJ">SSWJ</option>
                        </select>
                    </div>
                    </div>
                    <input type="hidden" id="area" name="area" value="TARGET">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('audits.targets') }}" class="btn btn-primary btn-outline" wire:navigate>
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
