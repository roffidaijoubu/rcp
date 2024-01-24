<?php
use function Laravel\Folio\name;
use App\Models\Audit;

name('audits');

$user = Auth::user();
$totalAudits = Audit::count();



?>


<x-dashboard-layout>

    <div class="container mx-auto pt-2">
        <div class="flex py-5 items-center">
            <h1 class="text-3xl font-bold mr-5">
                Audit
            </h1>
            <div class="flex gap-2">
                <a href="{{ route('audits.create') }}" class="btn btn-primary btn-outline" wire:navigate>
                    {{ __('Create New') }}
                </a>
            </div>
        </div>
        <table class="table w-full">
            <thead>
                <tr>
                    {{-- <th class="text-left">Audit Name</th> --}}
                    <th class="text-left">Satuan Kerja</th>
                    <th class="text-left">Area</th>
                    <th class="text-left">Year</th>
                    <th class="text-left">Author</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->audits as $item)
                    <tr>
                        {{-- <td class="text-left">{{ $item->name }}</td> --}}
                        <td class="text-left">{{ $item->satker }}</td>
                        <td class="text-left">{{ $item->area }}</td>
                        <td class="text-left">{{ $item->year }}</td>
                        <td class="text-left">{{ $item->user->name }}</td>
                        <td class="text-right flex justify-end gap-1">
                            <a class="btn btn-info btn-ghost btn-sm flex w-fit" href="{{ route('audits.edit', ['audit' => $item]) }}" wire:navigate>
                                Edit Detail
                            </a>
                            <a class="btn btn-info btn-ghost btn-sm flex w-[140px]" href="{{ route('audits.form', ['audit' => $item]) }}" wire:navigate>
                                Fill Audit
                            <span class="badge badge-accent badge-sm">
                                {{ $item->getAssessmentFilledStatus() }}
                            </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-dashboard-layout>
