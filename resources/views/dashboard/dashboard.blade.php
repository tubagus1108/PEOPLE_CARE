@extends('layouts.light.master')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card card-stats mt-4">
            <div class="card-body mb-0 bg-info">
                <div class="row">
                    <div class="col">
                        <h5>Member</h5>
                        <p class="dashboard">{{ $jumlah_members }}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape rounded-circle">
                        <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card card-stats mt-4">
            <div class="card-body mb-0 bg-danger">
                <div class="row">
                    <div class="col">
                        <h5>Self report</h5>
                        <p class="dashboard">{{ $self_report }}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape rounded-circle">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card card-stats mt-4">
            <div class="card-body bg-danger">
                <div class="row">
                    <div class="col">
                        <h5 style="font-size: 17.8px">Other report</h5>
                        <p class="dashboard">{{ $other_report }}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape rounded-circle">
                        <i class="fa fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card card-stats mt-4">
            <div class="card-body mb-0 bg-danger">
                <div class="row">
                    <div class="col">
                        <h5 style="font-size: 16.4px">Panic button</h5>
                        <p class="dashboard">{{$panic_button}}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape rounded-circle">
                        <i class="fa fa-exclamation-triangle"></i>
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