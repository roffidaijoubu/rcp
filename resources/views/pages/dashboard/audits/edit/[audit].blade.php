<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.edit');

?>

@php
    $ass = json_decode($audit->assessment);
@endphp

<x-dashboard-layout>
    <div class="flex">
        <section class="flex flex-col w-1/3">
            @foreach ($ass as $key1 => $value1)
                <div class="label">
                    <span class="badge">
                        {{ $value1->clause }}
                    </span>
                    {{ $value1->text }}
                </div>
                @foreach ($value1->items as $key2 => $value2)
                    <div class="pl-9 question bg-base-200 py-2 cursor-pointer pr-3" data-key1={{ $key1 }}
                        data-key2={{ $key2 }}>
                        <span class="badge">
                            {{ $value2->number }}
                        </span>
                        {{ $value2->text }}
                    </div>
                @endforeach
            @endforeach
        </section>
        <section class="w-2/3 bg-black">
            @foreach (json_decode($audit->assessment, true) as $key1 => $value1)
                @foreach ($value1['items'] as $key2 => $value2)
                    <div class="question-detail" data-key1={{ $key1 }} data-key2={{ $key2 }}>

                        @livewire('audit-inputs', [
                            'key1' => $key1,
                            'key2' => $key2,
                            'score' => $value2['score'],
                            'note' => $value2['note'],
                        ])
                    </div>
                @endforeach
            @endforeach
        </section>
    </div>





</x-dashboard-layout>






<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    // alert('hello');
    var audit = @json($audit);
    // Parse the audit.assessment string into a JSON object
    var assessment = JSON.parse(audit.assessment);
    console.log(assessment);
    // console when question is clicked
    $('.question').click(function() {
        $key1 = $(this).data('key1');
        $key2 = $(this).data('key2');
        // hide all question-detail divs
        $('.question-detail').hide();
        // show the question-detail div that matches the key1 and key2
        $('.question-detail[data-key1="' + $key1 + '"][data-key2="' + $key2 + '"]').show();
    });
</script>
