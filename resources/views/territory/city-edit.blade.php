@extends('layouts.light.master')
@section('title', 'City-edit')
@section('content')
<div class="col-md-12 col-lg-6">
    <div class="card">
        <form action="{{url('territory/city-edit-execute')}}" method="POST">@csrf
            <div class="card-body">
                <h5>Edit new Province</h5> <hr>
                    <input type="hidden" name="id" value="{{$data['id']}}">
                <div class="form-group">
                    
                </div>
                <div class="form-group">
                    <label for="">Choose Province : </label>
                                    <select name="province_id" id="" class="form-control">
                                        <option value="" hidden>Choose Province</option>
                                        @foreach ($province as $item)
                                            <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                    
                    <label for="">City Name : </label>
                    <input type="text" name="name" required class="form-control" value="{{$data['name']}}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">Process Update</button>
                </div>
            </div>
        </form>
    </div>    
</div>
@endsection