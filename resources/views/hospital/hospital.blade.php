@extends('layouts.light.master')
@section('title', 'Hospital')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Hospital Data</h4>
            <span>You can manage hospital date right here !</span>
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
                <div class="col-md-12 col-lg-12">  
                    <button class="btn btn-info" data-toggle="modal" data-target="#addHospital"><i class="fa fa-plus"></i> Add New</button>      
                    <table class="table table-striped data-table" id="data-hospital">
                        <thead>
                            <tr class="text-center">
                                <th width="50">#</th>
                                <th width="100px">Name</th>
                                <th>Address</th>
                                <th width="50px">Created At</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                    </table>   
                </div>         
            </div>
        </div>
    </div>
    
    {{-- Modal Add New Hospital --}}
    <div class="modal fade" id="addHospital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content" id="box_show_hospital">
            <form action="{{url('hospital/hospital-data')}}" method="POST">@csrf
                <div class="card-body">
                    <h5>Add new Hospital</h5> <hr>
                    <div class="form-group">
                        <label for="">Hospital Name : </label>
                        <input type="text" name="name"class="form-control">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Address : </label>
                        <textarea class="form-control" name="address" id="" cols="21" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Latitude  : </label>
                        <input type="text" name="latitude" id="latitude" class="form-control">
                        @if ($errors->has('latitude'))
                            <span class="text-danger">{{ $errors->first('latitude') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Longtitude : </label>
                        <input type="text" name="longtitude" id="longtitude" class="form-control">
                        @if ($errors->has('longtitude'))
                            <span class="text-danger">{{ $errors->first('longtitude') }}</span>
                        @endif
                    </div>
                    <div class="form-group" id="map"></div>
                    <div class="form-group">
                        <input type="text" name="type"class="form-control" value="1" hidden>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block">Process</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    {{-- Modal Edit Hospital --}}
    <div class="modal fade" id="editHospital" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content" id="box_edit_hospital">
        </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Datatable
            $(function(){
                $('#data-hospital').DataTable({
                    ajax: '{{route('hospital-datatable')}}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'name', name: 'name'},
                        { data: 'address', name: 'address'},
                        { data: 'created_at', name: 'created_at'},
                        { data: 'action', name: 'action'},
                    ],
                    language: {
                    searchPlaceholder: 'Citra Me..',
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

        // Ajax Edit Hospital Data
            editHospital = (link) =>
            {
                $.ajax(
                    {
                    url: link,
                    success: function(response){
                        $('#box_edit_hospital').html(response)
                        function initMap() {
                            const current = { lat: 3.5901977, lng: 98.6788886 };
                            const map = new google.maps.Map(document.getElementById("map_edit"), {
                                zoom: 4,
                                center: current,
                            });
                            const marker = new google.maps.Marker({
                                position: current,
                                map: map,
                            });
                            marker.setDraggable(true);
                            google.maps.event.addListener(marker, 'dragend', function (evt) {
                                $("#latitude_edit").val(evt.latLng.lat().toFixed(6));
                                $("#longtitude_edit").val(evt.latLng.lng().toFixed(6));

                                map.panTo(evt.latLng);
                            });
                            $("#latitude_edit").val(current['lat']);
                            $("#longtitude_edit").val(current['lng']);
                            
                        }
                    }
                })
            }
        
        // Map Event
            function initMap() {
                const current = { lat: 3.5901977, lng: 98.6788886 };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 4,
                    center: current,
                });
                const marker = new google.maps.Marker({
                    position: current,
                    map: map,
                });
                marker.setDraggable(true);
                google.maps.event.addListener(marker, 'dragend', function (evt) {
                    $("#latitude").val(evt.latLng.lat().toFixed(6));
                    $("#longtitude").val(evt.latLng.lng().toFixed(6));

                    map.panTo(evt.latLng);
                });
                $("#latitude").val(current['lat']);
                $("#longtitude").val(current['lng']);
                
            }
            
    </script>
@endsection