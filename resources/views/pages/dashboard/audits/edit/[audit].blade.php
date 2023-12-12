<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.edit');

?>

@php
    $ass = json_decode($audit->assessment);
@endphp

<x-dashboard-layout>
    <form action="" class="flex flex-col h-full" id="auditForm">
        <div class="h-[5%] shrink-0 grow-0 flex items-center justify-end px-5 border-b-[1px] border-base-content/50">
            <div class="w-full text-left">
                <h1 class="text-2xl font-bold">{{ $audit->name }}<div class="badge mr-3 inline-block">
                        {{ $audit->template }}</div>
                </h1>
            </div>
            <div id="isDirty" class="hidden italic mr-2 opacity-60 shrink-0">Unsaved Changes...</div>
            <button type="submit" class="btn-sm btn btn-primary">Submit</button>
        </div>
        <div class="flex h-[95%]">
            <section class="flex flex-col w-1/3 h-full overflow-y-scroll pb-[64px]">
                @foreach ($ass as $key1 => $value1)
                    <div class="flex gap-3 px-5 py-2 text-base-content/60 items-center">
                        <span class="badge bg-base-300">
                            {{ $value1->clause }}
                        </span>
                        {{ $value1->text }}
                    </div>
                    @foreach ($value1->items as $key2 => $value2)
                        <div class="pl-9 question bg-base-200 py-2 cursor-pointer pr-3" data-key1={{ $key1 }}
                            data-key2={{ $key2 }} id="q-{{ $key1 }}-{{ $key2 }}">
                            {{-- <span class="badge">
                                {{ $value2->number }}
                            </span> --}}
                            {{ $value2->text }}
                            <span class="badge badge-success badge-sm hidden"
                                data-indicator="[{{ $key1 }}]['items'][{{ $key2 }}]['score']">
                                <x-icon name="o-check" class="w-2 h-2" />
                            </span>
                        </div>
                    @endforeach
                @endforeach
            </section>
            <section class="w-2/3 bg-base-300">
                @foreach (json_decode($audit->assessment, true) as $key1 => $value1)
                    @foreach ($value1['items'] as $key2 => $value2)
                        <div class="question-detail w-full flex flex-col h-full pb-[52px]"
                            data-key1={{ $key1 }} data-key2={{ $key2 }} style="display: none;">
                            <div class="flex gap-4 h-[60px] bg-base-100/50 items-center px-5">
                                <span class="badge">
                                    {{ $value2['number'] }}
                                </span>
                                {{ $value2['text'] }}
                            </div>
                            <div class="join w-full px-5 py-5 justify-center">
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="0"
                                    aria-label="0" class="join-item w-1/6 btn" />
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="1"
                                    aria-label="1" class="join-item w-1/6 btn" />
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="2"
                                    aria-label="2" class="join-item w-1/6 btn" />
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="3"
                                    aria-label="3" class="join-item w-1/6 btn" />
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="4"
                                    aria-label="4" class="join-item w-1/6 btn" />
                                <input type="radio"
                                    name="[{{ $key1 }}]['items'][{{ $key2 }}]['score']" value="5"
                                    aria-label="5" class="join-item w-1/6 btn" />
                            </div>


                            <div class="form-group p-5 h-full flex flex-col gap-2">
                                <label class="text-base-content"
                                    for="note[{{ $key1 }}][{{ $key2 }}]">note</label>
                                <textarea name="[{{ $key1 }}]['items'][{{ $key2 }}]['note']"
                                    id="note-{{ $key1 }}-{{ $key2 }}" cols="30" rows="10" class="w-full textarea h-full" style="border-radius: 10px"></textarea>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </section>
        </div>

    </form>






</x-dashboard-layout>






{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
<script>
    var audit = @json($audit);
    console.log(audit.name);
    // Parse the audit.assessment string into a JSON object
    var assessment = JSON.parse(audit.assessment);
    // console when question is clicked
    var questions = document.querySelectorAll('.question');
    questions.forEach(function(question) {
        question.addEventListener('click', function() {
            var key1 = this.getAttribute('data-key1');
            var key2 = this.getAttribute('data-key2');
            // hide all question-detail divs
            var questionDetails = document.querySelectorAll('.question-detail');
            questionDetails.forEach(function(questionDetail) {
                questionDetail.style.display = 'none';
            });
            // show the question-detail div that matches the key1 and key2
            var matchingQuestionDetail = document.querySelector(
                '.question-detail[data-key1="' + key1 +
                '"][data-key2="' + key2 + '"]');
            matchingQuestionDetail.style.display = 'flex';
            // add class active to the question, remove from all others
            questions.forEach(function(question) {
                question.classList.remove('active');
            });
            this.classList.add('active');
        });
    });

    // check if form is dirty
    var form = document.getElementById('auditForm');
    var formIsDirty = false;
    form.addEventListener('change', function() {
        formIsDirty = true;
        document.getElementById('isDirty').classList.remove('hidden');
    });
    // if form is dirty, ask if they want to leave the page
    window.addEventListener('livewire:navigating', function(e) {
        if (formIsDirty) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

    // when a radio button is clicked, update the badge
    var inputsRadio = document.querySelectorAll('input[type="radio"]');
    inputsRadio.forEach(function(input) {
        input.addEventListener('click', function() {
            var inputsName = this.getAttribute('name');
            var inputsValue = this.getAttribute('value');
            var badge = document.querySelector('.badge[data-indicator="' + inputsName + '"]');
            badge.classList.remove('hidden');
            if (inputsValue == 0) {
                badge.classList.add('hidden');
            }
        });
    });


    // fill in the form with the existing data of score and note
    // by using the name attribute of the input elements
    // and the key names in the assessment object
    // ex score: name="[1]['items'][1]['score']"
    // ex note: name="[1]['items'][1]['note']"
    // handle submit
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(form); // Create a FormData object

        var assessmentToSubmit = JSON.parse(audit.assessment);

        for (var pair of formData.entries()) {
            var unusualVarName = pair[0];
            let dataStore = {};
            dataStore[unusualVarName] = pair[1];

            // Construct the assignment statement with a placeholder for the value
            var assignmentStatement = 'assessmentToSubmit' + unusualVarName + ' = value';

            // Create a new function that takes 'assessmentToSubmit' and 'value' as parameters
            let func = new Function('assessmentToSubmit', 'value', assignmentStatement);

            // Execute the function with 'assessmentToSubmit' and the actual value from the form
            func(assessmentToSubmit, pair[1]);
        }

        console.log(assessmentToSubmit);

        // send POST request to the api /api/audit/assessment/id, with body assessment : assessmentToSubmit
        fetch('/api/audit/assessment/' + audit.id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    assessment: assessmentToSubmit
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });


    if (document.getElementById('auditForm')) {

        var assessment = JSON.parse(audit.assessment);
        // console.log(assessment);
        var inputs = document.querySelectorAll('input, textarea');
        // console.log(inputs);
        inputs.forEach(function(input) {
            var name = input.getAttribute('name');
            if (name) {
                // console.log('assessment' + name + ' = ' + eval('assessment' + name))
                // check if input is a radio button


                var value = eval('assessment' + name);
                // console.log(name + ' = ' + value);
                if (value !== undefined) {
                    // check if input is a radio button
                    if (input.getAttribute('type') == 'radio') {
                        if (input.value == value) {
                            input.checked = true;
                            var badge = document.querySelector('.badge[data-indicator="' + name + '"]');
                            if (value == 0) {
                                badge.classList.add('hidden');
                            } else {
                                badge.classList.remove('hidden');
                            }
                        }
                    } else {
                        input.value = value;
                    }
                }
            }
        });


    }






    // alert('hello');
</script>
