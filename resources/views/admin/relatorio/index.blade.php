@extends('adminlte::page')

@section('title', 'Relatório')

@section('content_header')

<h1>Relatórios</h1>

<ol class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="">Relatórios</a></li>
</ol>
@stop

@section('content')
    @if(Auth::user()->tipo == "Coordenador")
        <div class="box">
            <div class="box-header">
                <div class="form-group">
                    <div class="col-md-12">
                        <p><h3><b>Pesquisa Por Matrícula:</b></h3></p>
                        <form action="{{ route('admin.relatorioSearch') }}" method="POST" role="search">
                            {{ csrf_field() }}
                            
                            <div class="col-md-3">
                                <input type="number" onkeypress="return event.charCode >= 48" min="1" class="form-control" id="turma_aluno_id" name="turma_aluno_id" placeholder="Matricula" required>
                            </div>
                            
                            <div class="col-md-3">
                                <select class="form-control col-md-2" id="disciplina_id" name="disciplina_id" required>
                                    <option selected disabled>Escolha uma disciplina</option>
                                    @foreach($disciplinas as $disciplina)
                                        <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" style="margin-top: 1rem;">
                                    <span class="glyphicon glyphicon-search"> Buscar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <p><h3><b>Pesquisa Por Turma:</b></h3></p>
                        <form action="{{ route('admin.relatorioSearch') }}" method="POST" role="search">
                            {{ csrf_field() }}

                            <div class="col-md-3">
                                <select class="form-control col-md-2" id="turma_id" name="turma_id" required>
                                    <option selected disabled>Escolha uma turma</option>
                                    @foreach($turmas as $turma)
                                    @if($turma->ativo == true)
                                    <option value="{{$turma->id}}">{{$turma->nome}}/{{$turma->turno}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control col-md-2" id="disciplina_id" name="disciplina_id" required>
                                    <option selected disabled>Escolha uma disciplina</option>
                                    @foreach($disciplinas as $disciplina)
                                        <option value="{{$disciplina->id}}">{{$disciplina->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-warning" style="margin-top: 1rem;">
                                    <span class="glyphicon glyphicon-search"> Buscar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
            </div>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('message') }}
            </div>
            @endif
            <br><br>
            @isset($notas)
            <div class="container">
                @isset($aluno)
                    <h3><b>Aluno(a): {{$aluno[0]->nome}}</b></h3>
                @endisset
                @isset($turma_nome)
                    <h3><b>Turma: {{$turma_nome[0]->nome}}</b></h3>
                @endisset
                <h3><b>Disciplina: {{$disciplina_nome[0]->nome}}</b></h3>
            </div>
            <br><br>
            <div class="box-body">
                <div class="col-md-6">
                    <canvas id="bar-chart" width="800" height="450"></canvas>
                </div>
                <!-- <div class="col-md-6">
                    <canvas id="line-chart" width="800" height="450"></canvas>
                </div> -->
                <div class="col-md-6">
                    <canvas id="pie-chart" width="800" height="450"></canvas>
                </div>
                <!-- <div class="col-md-6">
                    <canvas id="radar-chart" width="800" height="600"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="polar-chart" width="800" height="450"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="doughnut-chart" width="800" height="450"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="mixed-chart" width="800" height="450"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="bubble-chart" width="800" height="800"></canvas>
                </div> -->
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <script>
            // Bar chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["I Unidade", "II Unidade", "III Unidade", "IV Unidade"],
                    datasets: [{
                        label: "Notas (Média)",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
                        data: @json($notas)
                    }],
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Médias por unidade'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                                min: 0,
                                max: 10
                            }
                        }]
                    }
                }
            });

            // new Chart(document.getElementById("line-chart"), {
            //     type: 'line',
            //     data: {
            //         labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
            //         datasets: [{
            //             data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
            //             label: "Africa",
            //             borderColor: "#3e95cd",
            //             fill: false
            //         }, {
            //             data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
            //             label: "Asia",
            //             borderColor: "#8e5ea2",
            //             fill: false
            //         }, {
            //             data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
            //             label: "Europe",
            //             borderColor: "#3cba9f",
            //             fill: false
            //         }, {
            //             data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
            //             label: "Latin America",
            //             borderColor: "#e8c3b9",
            //             fill: false
            //         }, {
            //             data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
            //             label: "North America",
            //             borderColor: "#c45850",
            //             fill: false
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'World population per region (in millions)'
            //         }
            //     }
            // });

            new Chart(document.getElementById("pie-chart"), {
                type: 'pie',
                data: {
                    labels: ["Presença", "Ausência"],
                    datasets: [{
                        label: "Presença (frequência)",
                        backgroundColor: ["#3e95cd", "#8e5ea2"],
                        data: @json($frequencias)
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Frequência'
                    }
                }
            });

            // new Chart(document.getElementById("radar-chart"), {
            //     type: 'radar',
            //     data: {
            //         labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            //         datasets: [{
            //             label: "1950",
            //             fill: true,
            //             backgroundColor: "rgba(179,181,198,0.2)",
            //             borderColor: "rgba(179,181,198,1)",
            //             pointBorderColor: "#fff",
            //             pointBackgroundColor: "rgba(179,181,198,1)",
            //             data: [8.77, 55.61, 21.69, 6.62, 6.82]
            //         }, {
            //             label: "2050",
            //             fill: true,
            //             backgroundColor: "rgba(255,99,132,0.2)",
            //             borderColor: "rgba(255,99,132,1)",
            //             pointBorderColor: "#fff",
            //             pointBackgroundColor: "rgba(255,99,132,1)",
            //             pointBorderColor: "#fff",
            //             data: [25.48, 54.16, 7.61, 8.06, 4.45]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Distribution in % of world population'
            //         }
            //     }
            // });

            // new Chart(document.getElementById("polar-chart"), {
            //     type: 'polarArea',
            //     data: {
            //         labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            //         datasets: [{
            //             label: "Population (millions)",
            //             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            //             data: [2478, 5267, 734, 784, 433]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Predicted world population (millions) in 2050'
            //         }
            //     }
            // });

            // new Chart(document.getElementById("doughnut-chart"), {
            //     type: 'doughnut',
            //     data: {
            //         labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            //         datasets: [{
            //             label: "Population (millions)",
            //             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            //             data: [2478, 5267, 734, 784, 433]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Predicted world population (millions) in 2050'
            //         }
            //     }
            // });

            // new Chart(document.getElementById("bar-chart-horizontal"), {
            //     type: 'horizontalBar',
            //     data: {
            //         labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
            //         datasets: [{
            //             label: "Population (millions)",
            //             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            //             data: [2478, 5267, 734, 784, 433]
            //         }]
            //     },
            //     options: {
            //         legend: {
            //             display: false
            //         },
            //         title: {
            //             display: true,
            //             text: 'Predicted world population (millions) in 2050'
            //         }
            //     }
            // });

            // new Chart(document.getElementById("bar-chart-grouped"), {
            //     type: 'bar',
            //     data: {
            //         labels: ["1900", "1950", "1999", "2050"],
            //         datasets: [{
            //             label: "Africa",
            //             backgroundColor: "#3e95cd",
            //             data: [133, 221, 783, 2478]
            //         }, {
            //             label: "Europe",
            //             backgroundColor: "#8e5ea2",
            //             data: [408, 547, 675, 734]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Population growth (millions)'
            //         }
            //     }
            // });

            // new Chart(document.getElementById("mixed-chart"), {
            //     type: 'bar',
            //     data: {
            //         labels: ["1900", "1950", "1999", "2050"],
            //         datasets: [{
            //             label: "Europe",
            //             type: "line",
            //             borderColor: "#8e5ea2",
            //             data: [408, 547, 675, 734],
            //             fill: false
            //         }, {
            //             label: "Africa",
            //             type: "line",
            //             borderColor: "#3e95cd",
            //             data: [133, 221, 783, 2478],
            //             fill: false
            //         }, {
            //             label: "Europe",
            //             type: "bar",
            //             backgroundColor: "rgba(0,0,0,0.2)",
            //             data: [408, 547, 675, 734],
            //         }, {
            //             label: "Africa",
            //             type: "bar",
            //             backgroundColor: "rgba(0,0,0,0.2)",
            //             backgroundColorHover: "#3e95cd",
            //             data: [133, 221, 783, 2478]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Population growth (millions): Europe & Africa'
            //         },
            //         legend: {
            //             display: false
            //         }
            //     }
            // });

            // new Chart(document.getElementById("bubble-chart"), {
            //     type: 'bubble',
            //     data: {
            //         labels: "Africa",
            //         datasets: [{
            //             label: ["China"],
            //             backgroundColor: "rgba(255,221,50,0.2)",
            //             borderColor: "rgba(255,221,50,1)",
            //             data: [{
            //                 x: 21269017,
            //                 y: 5.245,
            //                 r: 15
            //             }]
            //         }, {
            //             label: ["Denmark"],
            //             backgroundColor: "rgba(60,186,159,0.2)",
            //             borderColor: "rgba(60,186,159,1)",
            //             data: [{
            //                 x: 258702,
            //                 y: 7.526,
            //                 r: 10
            //             }]
            //         }, {
            //             label: ["Germany"],
            //             backgroundColor: "rgba(0,0,0,0.2)",
            //             borderColor: "#000",
            //             data: [{
            //                 x: 3979083,
            //                 y: 6.994,
            //                 r: 15
            //             }]
            //         }, {
            //             label: ["Japan"],
            //             backgroundColor: "rgba(193,46,12,0.2)",
            //             borderColor: "rgba(193,46,12,1)",
            //             data: [{
            //                 x: 4931877,
            //                 y: 5.921,
            //                 r: 15
            //             }]
            //         }]
            //     },
            //     options: {
            //         title: {
            //             display: true,
            //             text: 'Predicted world population (millions) in 2050'
            //         },
            //         scales: {
            //             yAxes: [{
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: "Happiness"
            //                 }
            //             }],
            //             xAxes: [{
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: "GDP (PPP)"
            //                 }
            //             }]
            //         }
            //     }
            // });
        </script>
    @endisset
    @else
        <div class="text-center">
            <p><h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1></p>
            <p><h2>Você não tem acesso a esta página !</h2></p>
        </div>
    @endif
@stop