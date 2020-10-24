$(document).ready(function(){
    var firstname = false;
    var lastname = false;
    var username = true;
    var email = true;
    var password = false;

    // Check Username Exist
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
                    if(response == 'success'){
                      $('#username').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Username ready to use !');
                      username = true;
                    }else{
                      $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username is already exist !');
                      username = false;
                    }
                }
            });
          }else{
            $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username is already exist !');
            username = false;
          }
    });

    // Check Email Exist
    $('#email').keyup(function(){
          var linkAPI = "{{url('auth/check_email_exist')}}";
          var inCheck = $(this).val();
          var emailReady = false;
          if($(this).val().length > 0){
                for(var i=0; i<$(this).val().length; i++){
                  if(i!=0 && i!=$(this).val().length-1){
                    if($(this).val()[i] == '@'){
                      emailReady = true;
                      break;
                    }
                  }else{
                    if($(this).val()[i] == '@'){
                      emailReady = false;
                      break;
                    }
                  }
                }
                if(emailReady == true){
                    $.ajax({                                            
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },  
                      url: linkAPI, 
                      type: 'POST',  
                      data: {
                        email :  inCheck,
                      },                    
                      success: function(response)          
                      {   
                          if(response == 'success'){
                            $('#email').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Email ready to use !');
                            email = true;
                          }else{
                            $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Email is already exist !');
                            email = false;
                          }
                      }
                  });
                }else{
                  $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Email format is not supported, expected e.q : example@mail.com !');
                  email = false;
                }
          }else{
            $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Cannot be empty !');
            email = false;
          }
    });



    var element = ['#first-name','#last-name', '#username', '#email', '#password'];
    $(element[0]).keyup(function(){
        if($(this).val().length > 0){
            $(element[0]).removeClass('is-invalid').addClass('is-valid').attr('data-original-title','Ready to use');
            firstname = true;
        }
        else{
            $(element[0]).removeClass('is-valid').addClass('is-invalid').attr('data-original-title','Cannot be empty');
            firstname = false;
        }
    });
    $(element[1]).keyup(function(){
        if($(this).val().length > 0){
            $(element[1]).removeClass('is-invalid').addClass('is-valid').attr('data-original-title','Ready to use')
            lastname = true;
        }
        else{
            $(element[1]).removeClass('is-valid').addClass('is-invalid').attr('data-original-title','Cannot be empty');
            lastname = false;
        }
    });
    $(element[4]).keyup(function(){
        if($(this).val().length > 7){
            $(element[4]).removeClass('is-invalid').addClass('is-valid').attr('data-original-title','Ready to use')
            password = true;
        }
        else{
            $(element[4]).removeClass('is-valid').addClass('is-invalid').attr('data-original-title','Minumum 8 Characters')
            password = false;
        }
    });




    $('#signup').click(function(){                
        for(var i=0; i<element.length; i++){                    
            if($(element[i]).val().length < 1){
                $(element[i]).removeClass('is-valid').addClass('is-invalid').attr('title', 'Cannot be empty !');
            }
        }

        // Check Username Exist
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
                  if(response == 'success'){
                    $('#username').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Username ready to use !');
                    username = true;
                  }else{
                    $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Username is already exist !');
                    username = false;
                  }
              }
          });
        }else{
          $('#username').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Cannot be empty !');
          username = false;
        }


        // Check Email Exist
        var linkCheckEmailAPI = "{{url('auth/check_email_exist')}}";
        var inEmailCheck = $('#email').val();
        var emailFormatReady = false;
        if($('#email').val().length > 0){
              for(var i=0; i<$('#email').val().length; i++){
                if(i!=0 && i!=$('#email').val().length-1){
                  if($('#email').val()[i] == '@'){
                    emailFormatReady = true;
                    break;
                  }
                }else{
                  if($('#email').val()[i] == '@'){
                    emailFormatReady = false;
                    break;
                  }
                }
              }
              if(emailFormatReady == true){
                  $.ajax({                                            
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },  
                    url: linkCheckEmailAPI, 
                    type: 'POST',  
                    data: {
                      email :  inEmailCheck,
                    },                    
                    success: function(response)          
                    {   
                        if(response == 'success'){
                          $('#email').removeClass('is-invalid').addClass('is-valid').attr('data-original-title', 'Email ready to use !');
                          email = true;
                        }else{
                          $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Email is already exist !');
                          email = false;
                        }
                    }
                });
              }else{
                $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Email format is not supported, expected e.q : example@mail.com !');
                email = false;
              }
        }else{
          $('#email').removeClass('is-valid').addClass('is-invalid').attr('data-original-title', 'Cannot be empty !');
          email = false;
        }
        

        if(firstname&&lastname&&username&&email&&password){
          // $('#form-register').submit();
          alert('ok');
        }
      });
});