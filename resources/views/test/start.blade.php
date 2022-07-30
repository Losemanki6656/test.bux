@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Forms</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Start Test</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="row g-3 align-items-center">
                        <div class="col">
                            <h5 class="mb-0">Start Test</h5>
                        </div>
                        <div class="col"> </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-6 col-xl-6">
                            <div id="chart4"></div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6">
                            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 g-3">
                                <div class="col">
                                    <div class="card radius-10 mb-0 shadow-none bg-light-purple">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-0 text-purple">{{ $count->count }}</h5>
                                                <p class="mb-0 text-purple">Test Count</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 mb-0 shadow-none bg-light-orange">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-0 text-orange">{{ $count->test_time }} min</h5>
                                                <p class="mb-0 text-orange">Load Time</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 mb-0 shadow-none bg-light-success">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-0 text-success">{{ $questions }}</h5>
                                                <p class="mb-0 text-success"> Total Tests</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card radius-10 mb-0 shadow-none bg-light-primary">
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="mb-0 text-primary">48</h5>
                                                <p class="mb-0 text-primary">Requests</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{ route('runtest') }}" method="post">
                            @csrf
                            <div class="text-center mx-auto">
                                <div class="row">
                                    <div class="col">
                                        <select name="lang_id" class="form-select">
                                            <option value="1">Uz</option>
                                            <option value="2">Ru</option>
                                            <option value="3">En</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        @if ($status == false)
                                            <button type="submit" class="btn btn-primary px-5 radius-30"
                                            style="width: 100%">Start</button>
                                        @else
                                            <button type="submit" class="btn btn-warning px-5 radius-30"
                                            style="width: 100%">Continue</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [68],
            chart: {
                foreColor: '#9ba7b2',
                height: 280,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: '82%',
                        //background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: false,
                            top: 3,
                            left: 0,
                            blur: 4,
                            color: 'rgba(0, 169, 255, 0.15)',
                            opacity: 0.65
                        }
                    },
                    track: {
                        background: '#dfecff',
                        //strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: false,
                            top: -3,
                            left: 0,
                            blur: 4,
                            color: 'rgba(0, 169, 255, 0.85)',
                            opacity: 0.65
                        }
                    },
                    dataLabels: {
                        showOn: 'always',
                        name: {
                            offsetY: -25,
                            show: true,
                            color: '#6c757d',
                            fontSize: '16px'
                        },
                        value: {
                            formatter: function(val) {
                                return val + "%";
                            },
                            color: '#000',
                            fontSize: '45px',
                            show: true,
                            offsetY: 10,
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'horizontal',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#3361ff'],
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            colors: ["#3361ff"],
            labels: ['mc'],
        };

        var chart = new ApexCharts(document.querySelector("#chart4"), options);
        chart.render();
    </script>
@endsection
