@extends('layouts.light.master')
@section('title', 'Hospital Settings')
@section('content')
<div class="container-fluid page__container">
     <div class="row p-2">
        <div class="col-12">
            <i class="fas fa-ambulance"></i>
            <span class="ml-2">Hospital settings</span>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <img src="https://www.vectorjunky.com/wp-content/uploads/2017/02/Pr%20122-%20TRI%20-%2025_02_11%20-%20006.jpg" class="card-img-top img-thumbnail" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$data['name']}}</h5>
                                <p class="card-text">{{$data['address']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="col">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addpegawai">Tambah Pegawai</button>
                        </div>
                        <div class="col mt-2">        
                            <table class="table table-striped data-table" id="data-pegawai">
                                <thead>
                                    <tr class="text-center">
                                        <th width="50">#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th width="50px">Created At</th>
                                    </tr>
                                </thead>
                            </table>   
                        </div>
                        <div class="col mt-2">
                            
                        </div>                    
                    </div>
                </div>
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
                    {{-- <label for="">Jabatan</label>
                    <select name="" id="" class="form-control">
                        <option value="" hidden>Choose Jabatan</option>
                        <option value="1">Dokter</option>
                        <option value="2">Perawat</option>
                        <option value="3">Sopir Ambulance</option>
                    </select> --}}
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
@endsection
@section('script')
    <script>
        $(function(){
                $('#data-pegawai').DataTable({
                    ajax: '{{route('pegawai-datatable')}}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'name', name: 'name'},
                        { data: 'username', name: 'username'},
                        { data: 'phone', name: 'phone'},
                        { data: 'email', name: 'email'},
                        { data: 'created_at', name: 'created_at'},
                    ],
                    language: {
                    searchPlaceholder: 'Pegawai Hos..',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                    destroy: true
                    },  

                    // columnDefs:[
                    //     {
                    //         "targets" : [0,2,3],
                    //         "className": "text-center"
                    //     },
                    // ],              
                    
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
    </script>
@endsection