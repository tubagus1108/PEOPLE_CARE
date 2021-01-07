@extends('layouts.light.master')
@section('title', 'People-Members')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>People Members</h4>
        <span>You can manage people members data right here !</span>
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
            <table class="table table-striped data-table" id="members-datatable">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>National_ID</th>
                        <th>Full_Name</th>
                        <th>Created_at</th>
                        <th>Status</th>
                        <th>Action</th>
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
            $('#members-datatable').DataTable({
                ajax: '{{route('members-datatable')}}',
                columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'national_id', name: 'national_id' },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action'},

                ],
                columnDefs:[
                    {
                        "targets" : [0,1,4,5],
                        "className": "text-center"
                    },
                ],     
            })
        });
</script>
@endsection