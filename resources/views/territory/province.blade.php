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
            <h4>Province Data</h4>
            <span>You can manage province date right here !</span>
        </div>
        <div class="card-body">
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
                <table class="table table-bordered" id="users-table">                  
                        <table class="table table-bordered data-table" id="data-province">
                            <thead>
                                <tr>
                                    <th width="50">id</th>
                                    <th>Name</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($province as $item)
                                <tr>
                                    <th width="50">{{$loop->iteration}}</th> 
                                    <th>{{$item['name']}}</th>
                                    <th>                               
                                        <a href="{{route('provinceEdit',$item->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button onclick="confirm_me('This action cannot be undo !', '{{url('territory/province-delete/'.$item['id'])}}')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </th>
                                </tr>                              
                                @endforeach
                                
                            </tbody>
                            <tbody>
                            </tbody>
                        </table>   
                    </table>
                </div>         
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            
            $('#data-province').DataTable();
        })
    </script>
@endsection