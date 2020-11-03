<div class="modal-header" >
    <h5 class="modal-title" id="exampleModalLabel">Show Firefighters</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body" id="box_show_hospital">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('assets/images/fire.jpg')}}" class="card-img-top" alt="...">
                        <hr style="padding-top: 5px;">
                        <span class="text-black" style="font-size: 150%;">{{$data['name']}}</span>
                    </div>
                </div>
                    <div class="col-lg-6 ml-5">
                        <button class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Pegawai</button>
                        
                    </div>
            </div>
        </div>
    </div>
</div>