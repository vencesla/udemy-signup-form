$(document).ready(function() {
    // Name validation
    var name = "";
    var email = "";
    var password = "";
    var confirm = "";
    var name_reg = /^[a-z ]+$/i
    var email_reg = /^[a-zA-Z0-9]+([._-]?[a-zA-Z0-9]+)*@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    var password_reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

    // Name validation
    $("#name").focusout(function(){
        var store = $.trim($("#name").val());
        if(store.length == "") {
            $(".name-error").html("Name is required!");
            $("#name").addClass("border-red");
            name = "";
        }else if(name_reg.test(store)){
            $(".name-error").html("");
            $("#name").addClass("border-green");
            $("#name").removeClass('border-red');
            name = store;
        }else{
            $(".name-error").html("Integer is not allowed!");
            $("#name").addClass("border-red"); 
            $("#name").removeClass("border-green"); 
            name = "";
        }    
    }) // Close name validation

    // * ===== Eamil Validation ==== * 

    $("#email").focusout(function(){
        var email_store = $.trim($("#email").val());
        if(email_store.length == "") {
            $(".email-error").html("Email is required!");
            $("#email").addClass("border-red");
            email = "";
        }else if(email_reg.test(email_store)) {
            $.ajax({
                type: 'POST',
                url: 'ajax/signup.php',
                dataType: 'JSON',
                beforeSend: function() {
                    $('.email-error').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
                },
                data: {'check_email': email_store},
                success: function(feedback){
                   setTimeout(function(){
                        if(feedback['error'] == 'email_success'){
                            $(".email-error").html('<div class="text-success"><i class="fa fa-check-circle"></i> Available</div>');
                            $("#email").addClass("border-green");
                            email = email_store;
                        }else if(feedback['error'] == 'email_fail'){
                            $(".email-error").html("Sorry this email already exist!");
                            $("#email").addClass("border-red"); 
                            $("#email").removeClass("border-green"); 
                            email = "";
                        }
                   }, 3000);
                }
            })
        }else{
            $(".email-error").html("Invalid Email format!");
            $("#email").addClass("border-red"); 
            $("#email").removeClass("border-green"); 
            email = "";
        }
    }) // Close Email Validations

    // validate password
    $('#password').focusout(function(){
        var password_store = $('#password').val();
        if(password_store.length == "") {
            $(".password-error").html("Password is required")
            $("#password").addClass("border-red");
            $("#password").removeClass("border-green");
            password = "";
        }else if(password_reg.test(password_store)){
            $(".password-error").html("<div class='text-success'><i class='fa fa-fa-check-circle'></i> Your password Is strong!</div>");
            $("#password").addClass("border-green");
            $("#password").removeClass("border-red");
            password = password_store;
        }else{
            $(".password-error").html("6 characters or longer. Combine upper and lowercase letters and numbers")
            $("#password").addClass("border-red");
            $("#password").removeClass("border-green");
            password = "";
        }
    }) // close password validations

    // Validate Confirm Password
    $('#confirm').focusout(function(){
        var confirm_store = $.trim($("#confirm").val());
        if(confirm_store.length == ""){
            $(".confirm-error").html("Confirm password is required")
            $("#confirm").addClass("border-red");
            $("#confirm").removeClass("border-green");
            confirm = ""
        }else if (confirm_store != password){
            $(".confirm-error").html("Password is not matched!")
            $("#confirm").addClass("border-red");
            $("#confirm").removeClass("border-green");
            confirm = ""
        }else{
            $(".confirm-error").html("")
            $("#confirm").addClass("border-green");
            $("#confirm").removeClass("border-red");
            confirm = confirm_store
        }
    }) // close Confirm password validation

    $("#submit").click(function() {
        if(name.length == ""){
            $(".name-error").html("Name is required!");
            $("#name").addClass("border-red");
            name = "";
        }

        if(email.length == ""){
            $(".email-error").html("Email is required!");
            $("#email").addClass("border-red");
            email = "";
        }

        if(password.length == ""){
            $(".password-error").html("Password is required!");
            $("#password").addClass("border-red");
            password = "";
        }

        if(confirm.length == ""){
            $(".confirm-error").html("Confirm password is required!");
            $("#confirm").addClass("border-red");
            confirm = "";
        }

        if(name.length !="" && email.length != "" && password.length != "" && confirm.length != "") {
            $.ajax({
                type: 'POST',
                url: 'ajax/signup.php?signup=true',
                data: $("#signup_submit").serialize(),
                dataType: 'JSON',
                beforeSend: function() {
                    $(".show-progress").addClass('progress');
                },
                success: function(feedback) {
                   setTimeout(function() {
                        if(feedback['error'] == "success"){
                            location = feedback.msg;
                        }
                   }, 3000)
                }
            })
        }
    })
})
