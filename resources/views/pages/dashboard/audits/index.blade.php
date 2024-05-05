<?php
use function Laravel\Folio\name;
use App\Models\Audit;

name('audits');

$user = Auth::user();
$totalAudits = Audit::where('area', '!=', 'TARGET')->count();

?>


<x-dashboard-layout>

    <div class="container mx-auto pt-2">
        <div class="flex py-5 items-center">
            <h1 class="text-3xl font-bold mr-5">
                Audit
            </h1>
            <div class="flex gap-2">
                <a href="{{ route('audits.create') }}" class="btn btn-primary btn-sm" wire:navigate>
                    {{ __('Create New') }}
                </a>
            </div>
            {{-- <div class="flex gap-2">
                <a href="{{ route('audits.targets') }}" class="btn btn-primary btn-outline ml-5 btn-sm" wire:navigate>
                    {{ __('See Targets') }}
                </a>
            </div> --}}
            <div class="flex items-center gap-2 ml-auto">
                <span>
                    Total: {{ $totalAudits }}
                </span>
                <span>
                    My Audits: {{ $user->audits->where('area', '!=', 'TARGET')->count() }}
                </span>
            </div>
        </div>
        <div class="">
            <table class="" id="auditsTable">
                <thead>
                    <tr>
                        <th class="text-left">
                            <div class="flex gap-3 items-center">
                                <span>Satuan Kerja</span>
                            </div>

                        </th>
                        <th class="text-left">
                            <div class="flex gap-3 items-center">
                                <span>Area</span>
                            </div>

                        </th>
                        <th class="text-left">
                            <div class="flex gap-3 items-center">
                                <span>Year</span>
                            </div>

                        </th>
                        <th class="text-left">
                            <div class="flex gap-3 items-center">
                                <span>Author</span>
                            </div>

                        </th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Audit::where('area', '!=', 'TARGET')->get() as $item)
                        <tr>
                            {{-- <td class="text-left">{{ $item->name }}</td> --}}
                            <td class="text-left">{{ $item->satker }}</td>
                            <td class="text-left">{{ $item->area }}</td>
                            <td class="text-left">{{ $item->year }}</td>
                            <td class="text-left">{{ $item->user->name }}</td>
                            <td class="text-right flex justify-end gap-1">
                                <a class="btn btn-info btn-ghost btn-sm flex w-fit"
                                    href="{{ route('audits.edit', ['audit' => $item]) }}" wire:navigate>
                                    Edit Detail
                                </a>
                                <a class="btn btn-info btn-ghost btn-sm flex w-[140px]"
                                    href="{{ route('audits.form', ['audit' => $item]) }}" wire:navigate>
                                    Fill Audit
                                    <span class="badge badge-{{ $item->getAssessmentFilledStatusColor() }} badge-sm">
                                        {{ $item->getAssessmentFilledStatus() }}
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <script>
            document.addEventListener('livewire:navigated', () => {
                // alert('navigated');
                $('#auditsTable').DataTable().destroy();
                let auditsTable = new DataTable('#auditsTable', {
                    columnDefs: [{
                        targets: [4],
                        orderable: false,
                        searchable: false,
                    }],
                    lengthChange: false
                });



            });
        </script>
    </div>
</x-dashboard-layout>
