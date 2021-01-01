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
        type: 'line'
    },
    title: {
        text: 'Type of Complaint'
    },
    subtitle: {
        text: 'PeopleCare - Developer'
    },
    xAxis: {
        categories: ['Jan', 'Feb']
    },
    yAxis: {
        title: {
            text: 'Complaint'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Self Report',
        data: [{{$self_report}}]
    }, {
        name: 'Other Report',
        data: [{{$other_report}}]
    },
    {
        name: 'Panic Button',
        data: [{{$panic_button}}]
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