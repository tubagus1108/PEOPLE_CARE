@extends('layouts.light.master')
@section('title', 'Province')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Province Data</h4>
            <span>You can manage province date right here !</span>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="row pb-4">
                <div class="col-12">
                    <div class="alert alert-success outline alert-dismissible fade show" role="alert"><i data-feather="thumbs-up"></i>
                        <p>{{session('success')}}</p>
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <form action="{{url('territory/province')}}" method="POST">@csrf
                            <div class="card-body">
                                <h5>Add new Province</h5> <hr>
                                <div class="form-group">
                                    <label for="">Province Name : </label>
                                    <input type="text" name="name"class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block">Process</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>      
                <div class="col-md-12 col-lg-8">                 
                    <table class="table table-striped data-table" id="data-province">
                        <thead>
                            <tr class="text-center">
                                <th width="50">#</th>
                                <th>Name</th>
                                <th width="100px">Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                    </table>   
                </div>         
            </div>
        </div>
    </div>


    {{-- Modal Edit Province --}}
    <div class="modal fade" id="editProvince" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content" id="box_edit_province">
        </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Datatable
         $(function(){
            $('#data-province').DataTable({
                ajax: '{{route('province-datatable')}}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action'},
                ],
                language: {
                searchPlaceholder: 'DKI Jakart..',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
                destroy: true
                },  

                columnDefs:[
                    {
                        "targets" : [0,2,3],
                        "className": "text-center"
                    },
                ],              
                
                dom: 'Bfrtip',  
                buttons: [
                    {extend:'copy', className: 'bg-info text-white rounded-pill ml-2 border border-white'},
                    {extend:'excel', className: 'bg-success text-white rounded-pill border border-white'},
                    {extend:'pdf', className: 'bg-danger text-white rounded-pill border border-white'},
                    {extend:'print', className: 'bg-warning text-white rounded-pill border border-white'},
                ],
                "bDestroy": true,
                "processing": true,
                "serverSide": true, 
            });
        });

        // Ajax Edit Province Data
        editProvince = (link) => {
            $.ajax({
                url: link,
                success: function(response){
                    $('#box_edit_province').html(response)
                }
            })
        }
    </script>
@endsection