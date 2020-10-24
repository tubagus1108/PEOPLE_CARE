// Function Preview Image
function preview_image(event,output_place){
    var reader = new FileReader();
    var allowedType = ['image/jpeg','image/jpg', 'image/png'];
    var allowed = false;
    var messageError = "";
    var json = {};
    for(var i=0; i<allowedType.length; i++){
        if(event.target.files[0]['type'] == allowedType[i]){
            if(event.target.files[0]['size'] <= 3e+6){
                allowed = true;
                break;
            }else{
                messageError = "File size is too big, supported only Max 3 Mb";
                allowed = false;
                break;
            }
        }else{
            messageError = "File type is not supported, supported only JPG, JPEG and PNG !";
            allowed = false;
        }
    }

    if(allowed == true){
        reader.onload = function()
        {
            var output = document.getElementById(output_place);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        json.success = true;
    }else{
        json.success = messageError;
    }
    return json;
}

// Floating Success or Error Information
function info(message,status){
    if(status == 'success'){
        $('.floating-info .box').css({'box-shadow':'0 0 5px #00FF00'});
        $('.floating-info .box').html('<div class="row"><div class="col-1 text-right"><i class="fa fa-check-square-o"></i></div><div class="col-10">'+message+'</div></div>');
        $('.floating-info').css({'right':'10px','transition-duration':'1s'});
        setTimeout(function(){ $('.floating-info').css({'right':'-1000px','transition-duration':'1s'}); }, 3000);
    }
    if(status == 'failed'){
        $('.floating-info .box').css({'box-shadow':'0 0 5px red'});
        $('.floating-info .box').html('<div class="row"><div class="col-1 text-right"><i class="fa fa-frown-o"></i></div><div class="col-10">'+message+'</div></div>');
        $('.floating-info').css({'right':'10px','transition-duration':'1s'});
        setTimeout(function(){ $('.floating-info').css({'right':'-1000px','transition-duration':'1s'}); }, 3000);
    }
}

// Floating Loading Animation
function loadAnimate(action){
    if(action == 'show'){
        $('.loading-data').css({'bottom':'300px','transition-duration':'0.5s'});
    }else{
        $('.loading-data').css({'bottom':'-1000px','transition-duration':'2s'});
    }
}

// Allow and Prevent Scroll
function scrollPrevent(){
    $('body').css({'overflow-y':'hidden'});
}
function scrollAllow(){
    $('body').css({'overflow-y':'scroll'});
}
