@extends('layouts.light.master')
@section('title', 'Firefighters Settings')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>{{$data['name']}} Settings</h4>
        <span>You can Settings Firefighters date right here !</span>
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
            <div class="col-lg-12 col-md-12">
                <div class="col">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpegawai"><i class="fa fa-plus"></i> Add Pegawai</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#showFirefighters"><i class="fa fa-eye"></i> Information Firefighters</button>
                    
                </div>    
                <table class="table table-bordered data-table" id="data-employee">
                    <thead>
                        <tr class="text-center">
                            <th width="50">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th width="10px">Email</th>
                            <th>Created At</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                </table>           
            </div>
        </div>
    </div>
</div>

{{-- Modal Add Pegwai --}}
<div class="modal fade" id="addpegawai" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content">
            <form action="{{url('hospital/{id}/hospital-add-pegawai')}}" method="POST">@csrf
            <div class="modal-header">
                <h4 class="modal-title">Add Pegawai</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="rest_id" value="{{$data['id']}}">
                <div class="form-group">
                    <label for="">Name : </label>
                    <input type="text" name="name"class="form-control">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>
                <div class="form-group">
                    <label for="">Username : </label>
                    <input type="text" name="username"class="form-control">
                    @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                </div>
                <div class="form-group">
                    <label for="">Password : </label>
                    <input type="text" name="password"class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Phone : </label>
                    <input class="form-control" type="number" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="">Email : </label>
                    <input class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label for="">Choose Pegawi : </label>
                    <select name="position_id" id="" class="form-control">
                        <option value="" hidden>Choose Employee</option>
                        @foreach ($employee as $item)
                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                        @endforeach
                    </select>
                </div>    
            </div>
            <div class="modal-footer">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Show Hospital --}}
<div class="modal fade" id="showFirefighters" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Show Firefighters</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <img src="{{asset('assets/images/f1.jpg')}}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$data['name']}}</h5>
                    <p class="card-text">{{$data['address']}}</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
{{-- Modal Edit Pegawai --}}
<div class="modal fade" id="editPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="box_edit_pegawai">
      </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        // Datatable
        $(function(){
            $('#data-employee').DataTable({
                ajax: '{{url('firefighters/pegawai-firefighters-datatable/'.$data['id'])}}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name'},
                    { data: 'username', name: 'username'},
                    { data: 'phone', name: 'phone'},
                    { data: 'email', name: 'email'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action'},
                ],
                language: {
                searchPlaceholder: 'Pegawai..',
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

        // Ajax Edit Pegawai Data
        editPegawai = (link) =>
            {
                $.ajax(
                    {
                    url: link,
                    success: function(response){
                        $('#box_edit_pegawai').html(response)
                    }
                })
            }
    </script>
@endsection