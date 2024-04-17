<?php
use App\Models\Audit;
?>
<main class="h-full w-full flex flex-col overflow-hidden" data-theme="light">
    <div class="flex py-3 md:py-5 items-center">
        <h1 class="text-lg md:text-3xl font-bold mr-5 text-center w-full md:mb-2">
            AM Maturity Level ISO 55001 : 2014
        </h1>
    </div>
    <div class="grid md:grid-cols-4 grid-cols-1 overflow-y-scroll">

        <section class="px-5 md:px-0 flex md:flex-col overflow-x-scroll md:overflow-y-scroll gap-4 md:pb-5 shrink-0 col-span-1 w-full ml-2">

            <script>
                let chartInstances = {};
                let maturityRadar;
                const borderColors = [
                    //red
                    'rgba(255, 99, 132, 1)',
                    //orange
                    'rgba(255, 159, 64, 1)',
                    //yellow
                    'rgba(255, 205, 86, 1)',
                    //green
                    'rgba(75, 192, 192, 1)',
                    //blue
                    'rgba(54, 162, 235, 1)',
                    //purple
                    'rgba(153, 102, 255, 1)',
                    //grey
                    'rgba(201, 203, 207, 1)',
                    //black
                    'rgba(0, 0, 0, 1)',
                    //pink
                    'rgba(255, 192, 203, 1)',
                    //brown
                    'rgba(139, 69, 19, 1)',

                ];
                const backgroundColors = borderColors.map(color => color.replace('1)', '0.1)'));
                document.addEventListener('livewire:navigated', () => {
                    let chartInstances = {};
                    let maturityRadar;
                });
            </script>
            @foreach (Audit::getConvertedScoreByAllSatker() as $satker => $scores)
                <div class="flex items-center gap-0 bg-base-200 text-base-content px-1 py-4 rounded-box">
                    <div class="text-lg font-bold" style="transform:rotate(-90deg)">
                        {{ $satker }}
                    </div>
                    <div>
                        <canvas id="maturity-charts-{{ $satker }}"></canvas>
                    </div>

                    <script>
                        document.addEventListener('livewire:navigated', () => {
                            let ctx_{{ $satker }} = document.getElementById('maturity-charts-{{ $satker }}');
                            let data_{{ $satker }} = @json($scores);
                            let labels_{{ $satker }} = Object.keys(data_{{ $satker }});
                            let values_{{ $satker }} = Object.values(data_{{ $satker }});

                            let chartInstance_{{ $satker }} = new Chart(ctx_{{ $satker }}, {
                                type: 'bar',
                                data: {
                                    labels: labels_{{ $satker }},
                                    datasets: [{
                                        label: 'Scores',
                                        data: values_{{ $satker }},
                                        borderWidth: 0.5,
                                        barPercentage: 0.5,
                                        backgroundColor: Array(values_{{ $satker }}.length).fill(
                                            'rgba(0, 123, 255, 0.5)'), // default color
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            max: 1000,
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: false
                                        },
                                        datalabels: {
                                            display: true,
                                            align: 'end',
                                            anchor: 'end',
                                            formatter: function(value, context) {
                                                return value;
                                            }
                                        }
                                    },
                                    responsive: true,
                                    maintainAspectRatio: false,

                                }
                            });

                            // Store the chart instance
                            chartInstances['{{ $satker }}'] = chartInstance_{{ $satker }};


                            // on bar click
                            ctx_{{ $satker }}.onclick = function(evt) {

                                var activePoints = chartInstance_{{ $satker }}.getElementsAtEventForMode(evt,
                                    'nearest', {
                                        intersect: true
                                    }, true);


                                if (activePoints.length > 0) {
                                    var firstPoint = activePoints[0];
                                    var label = chartInstance_{{ $satker }}.data.labels[firstPoint.index];
                                    var value = chartInstance_{{ $satker }}.data.datasets[firstPoint.datasetIndex].data[
                                        firstPoint
                                        .index];
                                    var year = label;
                                    var satker = '{{ $satker }}';
                                    console.log(year, satker);

                                    // make an event to change the radar chart
                                    let event = new CustomEvent('changeRadarChart', {
                                        detail: {
                                            year: year,
                                            name: satker,
                                            totalScore: value,
                                        }
                                    });
                                    document.dispatchEvent(event);

                                    // Reset color of all bars in all charts
                                    for (let key in chartInstances) {
                                        chartInstances[key].data.datasets[0].backgroundColor = Array(values_{{ $satker }}
                                            .length).fill('rgba(0, 123, 255, 0.5)'); // default color
                                        chartInstances[key].update();
                                    }

                                    // change color of clicked bar
                                    chartInstance_{{ $satker }}.data.datasets[0].backgroundColor[firstPoint.index] =
                                        'rgba(255, 0, 0, 0.5)'; // clicked color
                                    chartInstance_{{ $satker }}.update();
                                }
                            };
                        })
                    </script>
                </div>
            @endforeach
        </section>
        <section class="flex flex-col items-center justify-center md:overflow-y-scroll md:col-span-3 col-span-1 w-full">

            <div class="w-full h-full hidden justify-center items-center flex-col pt-5" id="radarContainer">
                <div
                    class="flex border-b-[2px] border-base-300  w-[90%] min-w-[400px] pb-2 mb-2 items-center justify-center pt-8">
                    <h3 class="text-center text-xl ">
                        <span class="font-bold" id="satker_name"></span> - <span id="satker_year"></span> - Total Score
                        :
                        <span id="satker_total_score"></span>

                    </h3>
                    <button id="fullscreenButton" class="btn btn-primary btn-outline btn-sm ml-auto">View in
                        Fullscreen</button>
                </div>

                <canvas id="maturity-radar-1" class="w-full h-full"></canvas>
            </div>

            <div id="noRadarChosen">
                <h3 class="w-[80%] min-w-[400px] pb-2 mb-2 text-center text-xl mx-auto">
                    <div class="h-[400px] w-[400px] opacity-50 mb-5 text-error">
                        <x-undraw illustration="visionary-technology" color="currentColor" />
                    </div>
                    <span class="flex gap-2 items-center">

                    </span>
                    Choose a bar to see the radar chart
                </h3>
            </div>
            <script>
                document.addEventListener('livewire:navigated', () => {
                    let fullscreenButton = document.getElementById('fullscreenButton');
                    fullscreenButton.addEventListener('click', function() {
                        let element = document.getElementById('radarContainer');

                        if (!document.fullscreenElement) {
                            maturityRadar.config.options.maintainAspectRatio = false;
                            maturityRadar.update();
                            if (element.requestFullscreen) {
                                element.requestFullscreen();
                            } else if (element.mozRequestFullScreen) {
                                /* Firefox */
                                element.mozRequestFullScreen();
                            } else if (element.webkitRequestFullscreen) {
                                /* Chrome, Safari and Opera */
                                element.webkitRequestFullscreen();
                            } else if (element.msRequestFullscreen) {
                                /* IE/Edge */
                                element.msRequestFullscreen();
                            }
                            fullscreenButton.textContent = 'Close Fullscreen';
                        } else {
                            maturityRadar.config.options.maintainAspectRatio = true;
                            maturityRadar.update();
                            let event = new CustomEvent('changeRadarChart', {
                                detail: {
                                    year: fullscreenButton.dataset.year,
                                    name: fullscreenButton.dataset.satker,
                                    totalScore: fullscreenButton.dataset.totalScore,
                                }
                            });
                            // emit the event
                            document.dispatchEvent(event);
                            if (document.exitFullscreen) {
                                document.exitFullscreen();

                            } else if (document.mozCancelFullScreen) {
                                /* Firefox */
                                document.mozCancelFullScreen();
                            } else if (document.webkitExitFullscreen) {
                                /* Chrome, Safari and Opera */
                                document.webkitExitFullscreen();
                            } else if (document.msExitFullscreen) {
                                /* IE/Edge */
                                document.msExitFullscreen();
                            }
                            fullscreenButton.textContent = 'View in Fullscreen';
                        }
                    });
                });
                // on change radar chart, console log detail
                document.addEventListener('changeRadarChart', (e) => {
                    // unhide the radar chart
                    document.getElementById('radarContainer').classList.remove('hidden');
                    document.getElementById('radarContainer').classList.add('flex');
                    document.getElementById('noRadarChosen').classList.add('hidden');

                    console.log('change radar chart');
                    console.log(e.detail);
                    let satkerName = e.detail.name;
                    let year = e.detail.year;
                    let totalScore = parseFloat(e.detail.totalScore).toFixed(2);


                    // Fetch data from the API
                    fetch(`/api/audit/combined/${satkerName}/${year}`)
                        .then(response => response.json())
                        .then(data => {
                            let labels = [];
                            let datasets = [];

                            // Populate labels and datasets from the fetched data
                            for (let key in data) {
                                let dataset = [];
                                for (let item of data[key]) {
                                    if (!labels.includes(item.label)) {
                                        labels.push(item.label);
                                    }
                                    dataset.push(item.value);
                                }
                                // use colors[index] to get the color
                                let borderColor = borderColors[datasets.length % borderColors.length];
                                let backgroundColor = backgroundColors[datasets.length % backgroundColors
                                    .length];
                                datasets.push({
                                    label: `${key}`,
                                    data: dataset,
                                    fill: true,
                                    backgroundColor: backgroundColor,
                                    borderColor: borderColor,
                                    pointBackgroundColor: backgroundColor,
                                    pointBorderColor: '#fff',
                                    pointHoverBackgroundColor: '#fff',
                                    pointHoverBorderColor: backgroundColor,
                                    borderWidth: 1
                                });
                            }

                            let chartData = {
                                labels: labels,
                                datasets: datasets
                            };

                            document.getElementById('satker_name').innerHTML = satkerName;
                            document.getElementById('satker_year').innerHTML = year;
                            document.getElementById('satker_total_score').innerHTML = totalScore;
                            document.getElementById('fullscreenButton').dataset.satker = satkerName;
                            document.getElementById('fullscreenButton').dataset.year = year;
                            document.getElementById('fullscreenButton').dataset.totalScore = totalScore;

                            let config = {
                                type: 'radar',
                                data: chartData,
                                options: {
                                    elements: {
                                        line: {
                                            borderWidth: 3
                                        }
                                    },
                                    scales: {
                                        r: {
                                            min: 0,
                                            max: 5,
                                            stepSize: 0.5
                                        }
                                    },
                                    responsive: true,
                                    // maintainAspectRatio: false
                                },
                            };

                            // Destroy the old chart if it exists
                            if (maturityRadar) {
                                maturityRadar.destroy();
                            }

                            maturityRadar = new Chart(
                                document.getElementById('maturity-radar-1'),
                                config
                            );
                        });
                });
            </script>

        </section>
    </div>

</main>
