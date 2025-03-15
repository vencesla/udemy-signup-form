function add_bio(bio){
    if(bio.length == ""){
        $('.bio-error').html("Bio is required");
        $('.bio-error').addClass("error");
        $('#bio_user').addClass("border-red");
        $('#bio_user').removeClass("border-green");
    }else{
        $.ajax({
            type: 'POST',
            url: 'ajax/profile.php?bio=true',
            data: {'bio' : bio },
            dataType: 'JSON',
            success: function(feedback){
                if(feedback['error'] == 'success'){
                location = 'index.php';
                }
            }
        })
    }
}

function add_facebook_account(fbk){
    var fbk_val = fbk.trim();
    var fbk_url = /^(http|https)\:(\/\/)(www)\.facebook\.com(\/)[a-zA-Z0-9]+$/;
    if(fbk_val.length == ""){
        $('.fbk-error').html("Facebook is required");
        $('.fbk-error').addClass("error");
        $('#fbk_user').css("border-color", "red");
    }else if(fbk_url.test(fbk_val)){
        $.ajax({
            type: 'POST',
            url: 'ajax/profile.php?add_facebook=true',
            data: { 'fbk_val': fbk_val },
            dataType: 'json', // ✅ Indique qu'on attend du JSON
            success: function(feedback) {
                if (feedback.error === 'success') {
                    window.location.href = 'index.php'; // ✅ Redirection correcte
                }
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX:", error); // ✅ Debugging si la requête échoue
            }
        });          
    }else{
        $('.fbk-error').html("Ivalid Facebook url");
        $('.fbk-error').addClass("error");
        $('#fbk_user').css("border-color", "red");
    }
}

function add_linkedin_account(lkd) {
    var lkd_val = lkd.trim();
    var fbk_url = /^(http|https)\:(\/\/)(www)\.linkedin\.com(\/)[a-zA-Z0-9]+$/;
    if(lkd.length == ""){
        $('.lkd-error').html("Linkedin is required");
        $('.lkd-error').addClass("error");
        $('#lkd_user').css("border-color", "red");
    }else if(fbk_url.test(lkd_val)){
        $.ajax({
            type: 'POST',
            url: 'ajax/profile.php?add_linkedin=true',
            data: { 'lkd_val': lkd_val },
            dataType: 'json', // ✅ Indique qu'on attend du JSON
            success: function(feedback) {
                if (feedback.error === 'success') {
                    $('.lkd-error').html("");
                    $('.lkd-error').removeClass("error");
                    $('#lkd_user').css("border-color", "green");
                    window.location.href = 'index.php'; // ✅ Redirection correcte
                }
            },
            error: function(xhr, status, error) {
                console.error("Erreur AJAX:", error); // ✅ Debugging si la requête échoue
            }
        });         
    }else{
        $('.lkd-error').html("Ivalid Linkedin url");
        $('.lkd-error').addClass("error");
        $('#lkd_user').css("border-color", "red"); 
    }
}

function change_password(current_pwd, new_pwd){
    var current_pwd = $.trim(current_pwd);
    var new_pwd = $.trim(new_pwd);
    if(current_pwd.length == ""){
        $(".current-error").html("Current Password is required");
        $(".current-error").addClass("error");
        $("#current_password").css("border-color", "red")
    }else{
        $(".current-error").html("");
        $(".current-error").removeClass("error");
        $("#current_password").css("border-color", "green")
    }

    if(new_pwd.length == ""){
        $(".new-error").html("New Password is required");
        $(".new-error").addClass("error");
        $("#new_password").css("border-color", "red")
    }else{
        $(".new-error").html("");
        $(".new-error").removeClass("error");
        $("#new_password").css("border-color", "green")
    }

    if(current_pwd.length != "" && new_pwd.length != "") {
        $.ajax({
            type: 'POST',
            url: 'ajax/profile.php?password=true',
            data: {'current_password': current_pwd, 'new_password': new_pwd},
            dataType: 'JSON',
            success: function(feedback){
                if(feedback['error'] == 'success'){
                    $(".new-error").html("");
                    $(".new-error").removeClass('error');
                    $("#new_password").css("border-color", "red")
                    location = 'index.php';
                }else if(feedback['error'] == 'pattern'){
                    $(".new-error").html(feedback['msg']);
                    $("#new_password").css("border-color", "red")
                }else if(feedback['error'] == 'current_password_wrong'){
                    $(".current-error").html(feedback['msg']);
                    $(".current-error").addClass('error');
                    $("#current_password").css("border-color", "red")
                }
            }
        })
    }
}

 // Validation Name
 function change_name(name){
    var name = $.trim(name);
    if(name.length == ""){
        $(".name-error").html("Name is required");
        $("#update_name").css("border-color", "red") 
    }else{
        $(".name-error").html("");
        $("#update_name").css("border-color", "green") 
    }
    if(name.length != ""){
        $.ajax({
            type: 'POST',
            url: 'ajax/profile.php?change_name=true',
            data: {'change_name' :name },
            dataType: 'JSON',
            success: function(feedback){
                
            }
        })
    }
}