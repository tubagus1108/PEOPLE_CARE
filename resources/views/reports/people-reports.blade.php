@extends('layouts.light.master')
@section('title', 'People-Reports')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>People Reports</h4>
            <span>You can manage people reports data right here !</span>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="row pb-4">
                <div class="col-12">

                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <table class="table table-striped data-table" id="data-reports">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Rescuer_ID</th>
                            <th>Rest_ID</th>
                            <th>People_UID</th>
                            <th>Report_Number</th>
                            <th>Report_Type</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>Accepted</th>
                            <th>Rejected</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                </table>  
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $('#data-reports').DataTable({
                ajax: '{{route('reports-datatable')}}',
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'rescuer_id', name: 'rescuer_id'},
                    { data: 'rest_id', name: 'rest_id'},
                    { data: 'people_uid', name: 'people_uid'},
                    { data: 'report_number', name: 'report_number'},
                    { data: 'report_type', name: 'report_type'},
                    { data: 'description', name: 'description'},
                    { data: 'prove_images1', name: 'prove_images1'},
                    { data: 'is_accepted', name: 'is_accepted'},
                    { data: 'why_rejected', name: 'why_rejected'},
                    { data: 'created_at', name: 'created_at'},

                ],
            })
        });
    </script>
@endsection