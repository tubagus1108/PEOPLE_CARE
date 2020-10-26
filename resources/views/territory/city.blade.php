@extends('layouts.light.master')
@section('content')
    @if(session('success'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>City Data</h4>
            <span>You can manage city date right here !</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <form action="" method="POST">@csrf
                            <div class="card-body">
                                <h5>Add City</h5>
                                <hr>
                                <div class="form-group">
                                    <label for="">Choose Province : </label>
                                    <select name="province_id" id="" class="form-control">
                                        <option value="" hidden>Choose Province</option>
                                        @foreach ($province as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">City Name : </label>
                                    <input type="text" name="name" required class="form-control" >
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">Process</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <table class="table table-bordered" id="users-table">
                        <form action="{{url('territory/city')}}" method="POST">@csrf
                            <table class="table table-bordered data-table" id="data-city">
                                <thead>
                                    <tr>
                                        <th width="50">Id</th>
                                        <th>Name</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($city as $item)
                                    <tr>
                                        <th width="50">{{$loop->iteration}}</th> 
                                        <th>{{$item['name']}}</th>
                                        <th>
                                            <a href="{{route('cityEdit',$item->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <button onclick="confirm_me('This action cannot be undo !', '{{url('territory/city-delete/'.$item['id'])}}')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </th>
                                    </tr>                                
                                    @endforeach
                                    
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </form>    
                    </table>
                </div>       
            </div>
        </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#data-city').DataTable();
        })
    </script>
@endsection