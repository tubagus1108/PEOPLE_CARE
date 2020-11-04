@extends('layouts.light.master')
@section('title', 'Firefighters Settings')
@section('content')
<div class="container-fluid page__container">
     <div class="row p-2">
        <div class="col-12">
            <i class="fas fa-ambulance"></i>
            <span class="ml-2">Firefighters settings</span>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <img src="{{asset('assets/images/f1.jpg')}}" class="card-img-top img-thumbnail" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$data['name']}}</h5>
                                <p class="card-text">{{$data['address']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="col">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addpegawai">Tambah Pegawai</button>
                        </div>
                        <div class="col mt-2">
                            
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
            <form action="">
            <div class="modal-header">
                <h4 class="modal-title">Add Pegawai</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name : </label>
                    <input type="text" name="name"class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username : </label>
                    <input type="text" name="username"class="form-control">
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
                    <label for="">Jabatan</label>
                    <select name="type" id="" class="form-control">
                        <option value="" hidden>Choose Jabatan</option>
                        <option value="1">Dummy</option>
                    </select>
                </div>       
            </div>
            <div class="modal-footer">
                <div class="form-group text-center">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        
    </script>
@endsection