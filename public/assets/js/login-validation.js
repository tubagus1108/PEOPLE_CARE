$(document).ready(function(){
    var linkAPI = "{{url('auth/check_username_exist')}}";
    alert(linkAPI)
    var username = false;
    $('#username').keyup(function(){
        var linkAPI = "{{url('auth/check_username_exist')}}";
        var inCheck = $(this).val();
        if($(this).val().length > 0)
        {
          $.ajax({                                            
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },  
              url: linkAPI, 
              type: 'POST',  
              data: {
                username :  inCheck,
              },                    
              success: function(response)          
              {   
                  if(response == 'failed'){
                    $('#username').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Username is Ready !');
                    $('#box-password').removeClass('d-none').addClass('d-block');
                    $('#login-button').html('LOGIN');
                    username = true;
                  }else{
                    $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username not found !');
                    $('#box-password').removeClass('d-block').addClass('d-none');
                    $('#login-button').html('CONTINUE');
                    username = false;
                  }
              }
          });
        }else{
          $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username is already exist !');
          $('#box-password').removeClass('d-block').addClass('d-none');
          $('#login-button').html('CONTINUE');
          username = false;
        }
    });

    $('#login-button').click(function(){
        var linkCheckUsernameAPI = "{{url('auth/check_username_exist')}}";
        var inUsernameCheck = $('#username').val();
        if($('#username').val().length > 0)
        {
          $.ajax({                                            
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },  
              url: linkCheckUsernameAPI, 
              type: 'POST',  
              data: {
                username :  inUsernameCheck,
              },                    
              success: function(response)          
              {   
                  if(response == 'failed'){
                    $('#username').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Username is Ready !');
                    $('#box-password').removeClass('d-none').addClass('d-block');
                    $('#login-button').html('LOGIN');
                    username = true;
                  }else{
                    $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username not found !');
                    $('#box-password').removeClass('d-block').addClass('d-none');
                    $('#login-button').html('CONTINUE');
                    username = false;
                  }
              }
          });
        }else{
          $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username is already exist !');
          $('#box-password').removeClass('d-block').addClass('d-none');
          $('#login-button').html('CONTINUE');
          username = false;
        }
      if(username == true)
        $('#form-login').submit();
    });
});