<form action="{{url('hospital/'.$data['uid'].'/employee-edit')}}" method="POST">@csrf
    <div class="modal-header">
        <h4 class="modal-title">Edit Pegawai</h4>
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
            <label for="">Username : </label>
            <input type="text" value="{{$data['username']}}" name="username"class="form-control">
            @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
        </div>
        <div class="form-group">
            <label for="">Password : </label>
            <input type="text" value="{{$data['password']}}" name="password"class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone : </label>
            <input class="form-control" value="{{$data['phone']}}" type="number" name="phone" required>
        </div>
        <div class="form-group">
            <label for="">Email : </label>
            <input class="form-control" value="{{$data['email']}}" name="email" required>
        </div>

        <div class="form-group">
            <label for="">Choose Pegawi : </label>
            <select name="position_id" id="" class="form-control">
                <option value="" hidden>Choose Employee</option>
                @foreach ($employee as $item)
                    <option @if($item['id'] == $data['position_id']) selected @endif value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>    
    </div>
    <div class="modal-footer">
        <div class="form-group text-center">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </div>
    </form>