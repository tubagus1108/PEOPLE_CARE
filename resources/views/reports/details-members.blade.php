@extends('layouts.light.master')
@section('title', 'Details-Members')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="col-12">
                <i class="fa fa-user"></i>
                <span>Members Detail</span>
            </div>
        </div>
        <div class="card-body">
                <h4>Information for <b class="bg-info text-white pl-3 pr-3">{{$data['first_name']}}</b></h4></h4>
                <span>You can do management of this member!</span>
            <form action="{{url('reports/'.$data['uid'].'/accepted')}}" method="POST">@csrf
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{asset('assets/images/avtar/16.jpg')}}" class="card-img-top" alt="...">
                                <div class="card body">
                                    <h5>{{$data['first_name']}}</h5>
                                    <span>{{$data['national_id']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <table class="table table-striped data-table" id="members-datatable">
                            <thead>
                                <tr class="text-center">
                                    <th>City</th>
                                    <th>Province</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($province as $p)
                                   <tr>
                                       <td>{{$p->name}}</td>
                                       <td>
                                           @foreach ($p->data as $d)
                                               {{$d->province_id}}
                                           @endforeach
                                       </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
                <button class="btn btn-primary">Accepted</button>
                <button class="btn btn-danger">Rejected</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    
@endsection