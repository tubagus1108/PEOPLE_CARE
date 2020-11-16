<form action="{{url('hospital/hospital-edit-execute')}}" method="POST">@csrf
    <div class="modal-header" >
        <h4 class="modal-title">Edit Hospital</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Name : </label>
            <input type="text" name="name" value="{{$data['name']}}" class="form-control">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        </div>
        <div class="form-group">
            <label for="">Address : </label>
            <input type="text" name="address" value="{{$data['address']}}" class="form-control">
            @if ($errors->has('address'))
            <span class="text-danger">{{ $errors->first('address') }}</span>
        @endif
        </div>
        <div class="form-group">
            <label for="">Latitude : </label>
            <input type="text" name="latitude" value="{{$data['latitude']}}" class="form-control">
            @if ($errors->has('latitude'))
            <span class="text-danger">{{ $errors->first('latitude') }}</span>
        @endif
        </div>
        <div class="form-group">
            <label for="">Longtitude : </label>
            <input type="text" name="longtitude" value="{{$data['longtitude']}}" class="form-control">
            @if ($errors->has('longtitude'))
            <span class="text-danger">{{ $errors->first('longtitude') }}</span>
        @endif
        </div>
        <div class="form-group" id="map_edit"></div>
        <div class="form-group">
            <input type="text" name="type"class="form-control" value="1" hidden>
        </div>
        <div class="form-group">
            <button class="btn btn-info btn-block">Process</button>
        </div>
    </div>
</form>
