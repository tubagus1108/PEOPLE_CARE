$('#photo').off('change').on('change', function(){
    var preview = preview_image(event)['success'];
    if(preview != true){
        info(preview,'failed');
        return;
    }else{
        var form = new FormData();
        var file = this.files[0];
        form.append('avatar', file);
        form.append('uid', $('#user-uid').val());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': 'Bearer '+$('#api-token').val(),
            }, 
            url : $('#api-edit-avatar').val(),
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data : form,
            success: function(response){
                info('Profile picture edited !', 'success');
            },
            error: function(response){
                info(response['responseJSON']['error'],'failed');
            }
        });
    }
});


var typingTimer;                //timer identifier
var doneTypingInterval = 2000;  //time in ms (5 seconds)

// Email Edit
var emailFormatReady = false;
$('#user_email').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#user_email').val()) {
        for(var i=0; i<$('#user_email').val().length; i++){
            if(i!=0 && i!=$('#user_email').val().length-1){
              if($('#user_email').val()[i] == '@'){
                emailFormatReady = true;
                break;
              }
            }else{
              if($('#user_email').val()[i] == '@'){
                emailFormatReady = false;
                break;
              }
            }
          }
        if(emailFormatReady == true)
            typingTimer = setTimeout(emailEdit, doneTypingInterval);
        else
            typingTimer = setTimeout(emailError, doneTypingInterval);

    }
});
function emailEdit () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, 
        url : $('#edit_email_url').val(),
        type: "POST",
        data: {
            email :  $('#user_email').val(),
          },  
        success: function(response){
            info(response['message'], 'success');
        },
        error: function(response){
            info(response['responseJSON']['error'],'failed');
        }
    });
}
function emailError(){
    info('Email format doesn\'t support', 'failed');
}

// DOB Edit
$("#user_dob").datepicker({
    onSelect: function(dateText, inst) {
        clearTimeout(typingTimer);
        var date = $('#user_dob').val();
        typingTimer = setTimeout(dobEdit, doneTypingInterval);
    }
});
function dobEdit(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, 
        url : $('#edit_dob_url').val(),
        type: "POST",
        data: {
            date_of_birth :  $('#user_dob').val(),
          },  
        success: function(response){
            info(response['message'], 'success');
        },
        error: function(response){
            info(response['responseJSON']['error'],'failed');
        }
    });
}

// Contact Edit
$('#user_contact').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#user_contact').val()) {
        typingTimer = setTimeout(contactEdit, doneTypingInterval);
    }
});
function contactEdit(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, 
        url : $('#edit_contact_url').val(),
        type: "POST",
        data: {
            contact :  $('#user_contact').val(),
          },  
        success: function(response){
            info(response['message'], 'success');
        },
        error: function(response){
            info(response['responseJSON']['error'],'failed');
        }
    });
}
