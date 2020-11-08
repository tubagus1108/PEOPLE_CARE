<form action="{{url('hospital/hospital-edit-execute')}}" method="POST">@csrf
    <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Edit Hospital</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="box_edit_hospital">
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
                    <input type="text" name="latitude" id="latitude_edit" class="form-control">
                    @if ($errors->has('latitude'))
                        <span class="text-danger">{{ $errors->first('latitude') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Longtitude : </label>
                    <input type="text" name="longtitude" id="longtitude_edit" class="form-control">
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
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@section('script')
    <script>
        
        
    </script>
@endsection