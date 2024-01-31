<?php
use function Laravel\Folio\name;
use Illuminate\Support\Collection;

name('audits.form');

?>

@php
    $ass = json_decode($audit->assessment);
@endphp

<x-dashboard-layout>
    <form action="" class="flex flex-col h-full " id="auditForm">
        <div class="lg:h-[5%] h-[10%] shrink-0 grow-0 flex items-center justify-end px-5 border-b-[1px] border-base-content/50">
            <div class="w-full text-left flex gap-2 items-center">
                <span class="badge badge-lg">
                    {{ $audit->satker }}
                </span>
                <span class="badge badge-lg">
                    {{ $audit->area }}
                </span>
                <span class="badge badge-lg">
                    {{ $audit->year }}
                </span>
            </div>
            <div id="isDirty" class="hidden italic mr-2 opacity-60 shrink-0">Unsaved Changes...</div>
            <div id="isSaved" class="hidden italic mr-2 text-success shrink-0">Audit Saved!</div>
            <button type="submit" class="btn-sm btn btn-success">Submit</button>
        </div>
        <div class="flex lg:h-[95%] h-[90%] relative">
            <section class="flex flex-col lg:w-1/3 h-full overflow-y-scroll pb-[64px]">
                @foreach ($ass as $key1 => $value1)
                    <div class="flex gap-3 px-5 py-2 text-base-content/60 items-center">
                        <span class="badge bg-base-300">
                            {{ $value1->clause }}
                        </span>
                        {{ $value1->text }}
                    </div>
                    @foreach ($value1->items as $key2 => $value2)
                        <div class="pl-9 question bg-base-200 py-2 cursor-pointer pr-3 flex justify-between" data-key1={{ $key1 }}
                            data-key2={{ $key2 }} id="q-{{ $key1 }}-{{ $key2 }}">
                            {{-- <span class="badge">
                                {{ $value2->number }}
                            </span> --}}
                            {{ $value2->text }}
                            <span class="badge badge-success badge-sm hidden ml-auto"
                                data-value="{{ $value2->score }}"
                                data-indicator="[{{ $key1 }}]['items'][{{ $key2 }}]['score']">
                                {{-- <x-icon name="o-check" class="w-2 h-2" /> --}}
                                {{ $value2->score }}
                            </span>
                        </div>
                    @endforeach
                @endforeach
            </section>

            <style>
                .badge[data-value="1"] {
                    background-color: #f44336;
                }
                .badge[data-value="2"] {
                    background-color: #ff9800;
                }
                .badge[data-value="3"] {
                    background-color: #ffc107;
                }
                .badge[data-value="4"] {
                    background-color: #8bc34a;
                }
                .badge[data-value="5"] {
                    background-color: #4caf50;
                }

            </style>
            <section class="lg:w-2/3 bg-base-300 fixed lg:relative right-0 h-full overflow-y-scroll w-auto pb-[200px] lg:pb-0">
                <div class="hidden md:flex question-detail lg:w-full flex-col items-center justify-center h-full lg:pb-[52px] w-screen">
                    <div class="text-primary opacity-30 w-[40%]">
                        <x-undraw illustration="empty" color="currentColor" />
                    </div>
                    <h3 class="mt-5 text-3xl text-base-content/20">
                        Select a question to begin..
                    </h3>
                </div>
                @foreach (json_decode($audit->assessment, true) as $key1 => $value1)
                    @foreach ($value1['items'] as $key2 => $value2)
                        <div class="question-detail  md:flex question-detail lg:w-full flex-col items-center justify-center h-full lg:pb-[52px] w-screen"
                            data-key1={{ $key1 }} data-key2={{ $key2 }} style="display: none;">
                            <div class="flex gap-4 h-[120px] bg-base-100/50 items-center px-5 w-full">
                                <span class="backButton md:hidden">
                                    <x-heroicon-o-chevron-left class="h-6 w-6 " />
                                </span>
                                <div class=" w-full">
                                    <div class="text-xs mb-.5 opacity-50">
                                        {{$value1['text']}}
                                    </div>
                                    <div class="text-[16px] lg:text-base">
                                        {{ $value2['text'] }}
                                    </div>
                                </div>
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


                            <div class="form-group p-5 h-full flex flex-col gap-2 w-full">
                                <label class="text-base-content"
                                    for="note[{{ $key1 }}][{{ $key2 }}]">Note</label>
                                <textarea name="[{{ $key1 }}]['items'][{{ $key2 }}]['note']"
                                    id="note-{{ $key1 }}-{{ $key2 }}" cols="30" class="w-full textarea h-full"
                                    style="border-radius: 10px"></textarea>
                            </div>
                            @if($audit->area != 'TARGET')
                            <div class="form-group p-5 flex flex-col gap-2 w-full">
                                <label class="text-base-content"
                                    for="evidence[{{ $key1 }}][{{ $key2 }}]">Evidence URL</label>
                                <input name="[{{ $key1 }}]['items'][{{ $key2 }}]['evidence']"
                                    id="evidence-{{ $key1 }}-{{ $key2 }}" class="w-full input"
                                    style="border-radius: 10px"></input>
                            </div>
                            @endif
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

    // when back button is clicked, add display none it's parent question-detail
    var backButtons = document.querySelectorAll('.backButton');
    backButtons.forEach(function(backButton) {
        backButton.addEventListener('click', function() {
            var questionDetail = this.closest('.question-detail');
            questionDetail.style.display = 'none';
        });
    });


    // check if form is dirty
    var form = document.getElementById('auditForm');
    var formIsDirty = false;
    form.addEventListener('change', function() {
        formIsDirty = true;
        document.getElementById('isSaved').classList.add('hidden');
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
            badge.innerHTML = inputsValue;
            badge.dataset.value = inputsValue;
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
        saveForm();
    });

    // auto save form every 10 seconds
    // setInterval(saveForm, 10000);

    function saveForm(){
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

        // send PUT request to the api /api/audit/assessment/id, with body assessment : assessmentToSubmit
        fetch('/api/audit/assessment/' + audit.id, {
                method: 'PUT',
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
                document.getElementById('isDirty').classList.add('hidden');
                formIsDirty = false;
                document.getElementById('isSaved').classList.remove('hidden');
                setTimeout(function() {
                    document.getElementById('isSaved').classList.add('hidden');
                }, 3000);
            })
            .catch((error) => {
                console.error('Error:', error);
            });

    }

    if (document.getElementById('auditForm')) {

        var assessment = JSON.parse(audit.assessment);
        // console.log(assessment);
        var inputs = document.querySelectorAll('input, textarea');
        // console.log(inputs);
        inputs.forEach(function(input) {
            var name = input.getAttribute('name');
            if (name) {
                if(name.includes('token')) {
                    return;
                }
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
</script>

