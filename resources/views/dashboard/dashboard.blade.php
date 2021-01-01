@extends('layouts.light.master')
@section('title', 'Dashboard')
@section('content')
<!-- Card stats -->
    <div class="row">
        {{-- Card User --}}
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats mt-4">
                <div class="card-body mb-0">
                    <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mt-0.1">Member</h5>
                        <span class="h3 font-weight-bold mb-0">{{ $jumlah_members }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-circle-08"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Report Diri Sendiri --}}
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats mt-4">
            <!-- Card body -->
                <div class="card-body mb-0">
                    <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mt-0.09">Self Report</h5>
                        <span class="h2 font-weight-bold mb-0">
                            {{$self_report}}
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fa fa-exclamation-circle"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Report Orang Lain --}}
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats mt-4">
            <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">others report</h5>
                        <span class="h2 font-weight-bold mb-0">
                            {{$other_report}}
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fa fa-exclamation-circle"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Report Panic Button --}}
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats mt-4">
            <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-3.5">Panic Button</h5>
                        <span class="h2 font-weight-bold mb-0">{{$panic_button}}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="fa fa-exclamation-circle"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="pengaduan"></div>
        </div>
    </div> 
    {{-- <div class="row mt-5">
        <div class="col-lg-6">
            <div id="province"></div>
        </div>
        <div class="col-lg-6">
            <div id="city"></div>
        </div>
    </div> --}}
@endsection
@section('dashboardcharts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
    // Pengaduan
Highcharts.chart('pengaduan', {
    chart: {
        type: 'area'
    },
    accessibility: {
        description: 'Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.'
    },
    title: {
        text: 'Type of complaint'
    },
    subtitle: {
        text: 'PeopleCare - Developer'
    },
    xAxis: {
        allowDecimals: false,
        labels: {
            formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        },
        accessibility: {
            rangeDescription: 'Range: 1940 to 2017.'
        }
    },
    yAxis: {
        title: {
            text: 'Complaint'
        },
        labels: {
            formatter: function () {
                return this.value / 1000 + 'k';
            }
        }
    },
    tooltip: {
        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
    },
    plotOptions: {
        area: {
            pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'self_report',
        data: []
    }, {
        name: 'other_report',
        data: []
        
    },{
        name: 'panic_button',
        data: []

    }]
});
    // city
    // Highcharts.chart('city', {
    //     chart: {
    //         type: 'column'
    //     },
    //     title: {
    //         text: 'Monthly Average Rainfall'
    //     },
    //     subtitle: {
    //         text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
    //         ],
    //         crosshair: true
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Rainfall (mm)'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     series: [{
    //         name: 'Tokyo',
    //         data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    //     }, {
    //         name: 'New York',
    //         data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    //     }, {
    //         name: 'London',
    //         data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    //     }, {
    //         name: 'Berlin',
    //         data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    //     }]
    // });
    </script>

@endsection