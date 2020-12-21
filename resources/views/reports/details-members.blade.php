@extends('layouts.light.master')
@section('title', 'Details-Members')
@section('content')
    <div class="card" style="background:none !important; border:none !important; box-shadow:none !important;">
        <div class="card-header" style="background:none !important;">
            <div class="col-12">
                <i class="fa fa-user"></i>
                <span>Members Detail</span>
            </div>
        </div>
        <div class="card-body">
            <h4>Information for <b class="bg-info text-white pl-3 pr-3">{{$data['first_name']}}</b></h4></h4>
            <span>You can do management of this member!</span>
            <form action="{{url('reports/'.$data['uid'].'/accepted')}}" method="POST">@csrf
                <div class="row mt-4">
                    <div class="col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/images/avtar/16.jpg')}}" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5>{{$data['first_name']}}</h5>
                                <span class="text-secondary">National ID : <span class="bold text-dark">{{$data['national_id']}}</span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="row">
                            @if($data['accepted'] == null)
                                <div class="col-6">
                                    <button class="btn btn-block btn-primary">ACCEPT</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-block btn-danger">REJECT</button>
                                </div>
                            @else
                                <div class="col-12">
                                    <div class="alert alert-success">
                                        <i class="fa fa-warning"></i>
                                        <span class="ml-2">This member has accepted !</span>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Detail Information</h3>
                                        </div>
                                        <div class="card-body">
                                            Province : {{$data['province_name']}} <br>
                                            City : {{$data['city_name']}}

                                            <div class="row mt-4">
                                                <div class="col-12 p-1 mt-4">
                                                    <img src="{{asset('assets/images/avtar/16.jpg')}}" style="width: 100%; height:300px;" alt="...">
                                                </div>
                                                <div class="col-12 p-1 mt-4">
                                                    <img src="{{asset('assets/images/avtar/16.jpg')}}" style="width: 100%; height:300px;" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection