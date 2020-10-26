@extends('layouts.light.master')
@section('content')
    <div class="col-md-12 col-lg-6">
            <div class="card">
                <form action="{{url('territory/province-edit-execute')}}" method="POST">@csrf
                    <div class="card-body">
                        <h5>Edit new Province</h5> <hr>
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <div class="form-group">
                            <label for="">Province : </label>
                            <input type="text" name="name" required class="form-control" value="{{$data['name']}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Process Update</button>
                    </div>
                </form>
            </div>    
    </div>
@endsection