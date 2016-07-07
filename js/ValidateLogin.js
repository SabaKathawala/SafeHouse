$(document).ready(function(){
    $("#sign-form").validate({
        rules: {
             email:{
                required:true,
                email:true
             } ,
             password: {
                 required: true,
                 minlength: 8
             }                    
        },
        messages: {
             email: "Please enter a valid email",
            
             password: {
                 required: "Please provide a password",
                 minlength: "Your password must be at least 8 characters long."
             }
            
        },
        submitHandler: function(form) {
            $("#error").html("");
            $("#overlay").show();
            $("#loading").show();
            var name = $("#email").val();

            var password = $("#password").val();
            
            
            $.getJSON("loginchecker.php",{sign:true, username:name},function(data,status)   
            {
                if(data.status=='failed')
                {
                    $("#error").html(data.msg);
                    $("#loading").hide();
                    $("#overlay").hide();
                }
                else if(data.status=='success')
                {   
                    var auth_id = ecrypt(password, data.msg);

                    var temp = data.msg;
                    $.getJSON("loginchecker.php", {set_auth:true, customer_id:temp,auth_id:auth_id,username:name}, function(data,status)
                    {
                        if(data.status=='failed')
                        {
                            alert("Unsuccessful: "+data.msg);
                            $("#sign-form").find("input[type=password], input[type=text]").val("");
                        }
                        else if(data.status=='success'){
                            $("#error").html(data.msg);
                            $("#sign-form").find("input[type=password], input[type=text]").val("");
                        }

                        $.get("mail_new.php",{change:true,sign_c:true,email:name},function(data,status)
                        {
                            $("#loading").hide();
                            $("#overlay").hide();
                        });       

                    });
                }   
            });
            
        }//end of submit handler
    });//validate

    $("#login-form").validate({
        rules: {
             email:{
                required:true,
                email:true
             } ,
             password: {
                 required: true
             },
             captcha_code: {
                required: true 
             }                    
        },
        messages: {
             email: "Please enter a valid email",
            
             password: {
                 required: "Please provide a password"
             },
             captcha_code: {
                 required: "Please enter captcha value"
             }
            
        },
        submitHandler: function(form) {
            
            $("#l_error").html("");

            var name = $("#l_email").val();
            var password = $("#l_password").val();
            var captcha = $("#captcha_code").val();
            $("#loading").show();
            
            $.getJSON("loginchecker.php",{login:true, username:name, captcha:captcha},function(data,status)   
            {
                if(data.status=='failed_c')
                {
                    $("#l_error").html(data.msg);
                    $("#login-form").find("input[type=text]").val("");
                    $("#loading").hide();
                }
                if(data.status=='failed_u')
                {
                    $("#l_error").html(data.msg);
                    $("#login-form").find("input[name=email], input[type=password]").val("");
                    $("#loading").hide();
                }
                else if(data.status=='success')
                {                           
                    var str = dcrypt(password, data.aid);
                    if(str == data.cid)
                    {
                       $.getJSON("http://localhost/SafeHouse/loginchecker.php",{session:true, username:name},function(data,status)   
                       {
                            if(data.status=='success'){
                                window.location.href = 'http://localhost/SafeHouse/UserPage.php';
                            }
                            else{
                                $("#l_error").html(data.msg);
                                $("#login-form").find("input[name=email], input[type=password], input[type=text]").val("");
                            }                

                       });  
                    }
                    else
                    {
                        $("#l_error").html("Username/Password incorrect");
                        $("#login-form").find("input[name=email], input[type=password]").val("");
                        $("#loading").hide();
                    }
                }
                $("#loading").hide();
            });
        }//end of submit handler
    });//validate
});//main