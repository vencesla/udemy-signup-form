$(document).ready(function(){
    var email = "";
    var password = "";

    // ==== Validation email ======
    $("#login-email").focusout(function(){
        var email_store = $.trim($("#login-email").val());
        if(email_store.length == ""){
            $(".login-email-error").html("Email is required");
            $("#login-email").addClass('border-red');
            email = ""
        }else{
            $(".login-email-error").html("");
            $("#login-email").removeClass('border-red');
            $("#login-email").addClass('border-green');
            email = email_store
        }
    }) // close email validation

    // ==== validation Password ====
    $("#login-password").focusout(function(){
        var password_store = $.trim($("#login-password").val());
        if(password_store.length == ""){
            $(".login-password-error").html("Password is required");
            $("#login-password").addClass('border-red');
            password = ""
        }else{
            $(".login-passord-error").html("");
            $("#login-password").addClass('border-green');
            $("#login-password").removeClass('border-red');
            password = password_store
        }
    }) // close password validation

    // === Submit the login form ===
    $("#login-submit").click(function() {
        if(email.length == ""){
            $(".login-email-error").html("Email is required");
            $("#login-email").addClass('border-red');
            email = ""
        }

        if(password.length == ""){
            $(".login-password-error").html("Password is required");
            $("#login-password").addClass('border-red');
            password = ""
        }

        if(password.length != "" && email.length != ""){
           $.ajax({
                type: 'POST',
                url: 'ajax/login.php?login-form=true',
                data: $("#login-submit-form").serialize(),
                dataType: 'JSON',
                success: function(feedback){
                   if(feedback['error'] == 'success'){
                        $(".login-error").html("");
                        $(".login-password-error").html("");
                        $("#login-email").addClass('border-green');
                        $("#login-password").addClass('border-green');
                        $("#login-email").removeClass('border-red');
                        $("#login-password").removeClass('border-red');
                        $(".login-error").addClass("login-progress");
                        setTimeout(function(){
                            location = feedback['msg'];
                        }, 2000)
                   }else if(feedback['error'] == 'no_password'){
                        $("#login-password").removeClass('border-green');
                        $("#login-password").addClass('border-red');
                        $(".login-error").html(feedback['msg']);
                   }else if(feedback['error'] == 'no_email') {
                        $("#login-email").removeClass('border-green');
                        $("#login-email").addClass('border-red');
                        $(".login-error").html(feedback['msg'])
                   }
                }
           })
        }
    })
    
})