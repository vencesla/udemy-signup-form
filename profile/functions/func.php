<?php
include '../connection/db.php';
function links(){
    GLOBAL $db;
   $user_id = $_SESSION['user_id'];
    $query = $db->prepare("SELECT * FROM users where id = ?");
    $query->execute([$user_id]);
    $r = $query->fetch(PDO::FETCH_OBJ);

    if(empty($r->image)) {
        $photo = "<img src='img/usr.png' class='usr_img'>";
        $photo_link = "<a href='add_photo.php' class='text-decoration-none'>Update Photo <i class='fa fa-pencil'></i></a>";
    }else{
        $photo = "<img src='img/$r->image' class='usr_img'>";
        $photo_link = "<a href='add_photo.php' class='text-decoration-none'>Update Photo <i class='fa fa-pencil'></i></a>";
    }
    if(empty($r->bio)){
        $bio = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#bio'>Add Bio <i class='fa fa-plus-circle'></i></a>";
    }else{
        $bio = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#bio'>update Bio <i class='fa fa-plus-circle'></i></a>"; 
    }
    if(empty($r->facebook)){
        $facebook = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#fbk'>Add Facebook <i class='fa fa-plus-circle'></i></a>";
    }else{
        $facebook = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#fbk'>Update Facebook <i class='fa fa-pencil'></i></a>";
    }
    if(empty($r->linkedin)){
        $linkedin = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#lkd'>Add Linkedin <i class='fa fa-plus-circle'></i></a>";
    }else{
        $linkedin = "<a class='text-decoration-none' href='#' data-bs-toggle='modal' data-bs-target='#lkd'>Update Linkedin <i class='fa fa-pencil'></i></a>";
    }

    echo "<ul class='list-group'>
            $photo
            <li class='list-group-item first-li'>$photo_link</li>
            <li class='list-group-item'>$bio</li>
            <li class='list-group-item'>$facebook</li>
            <li class='list-group-item'>$linkedin</li>
            <li class='list-group-item'><a href='#' data-bs-toggle='modal' data-bs-target='#password' class='text-decoration-none'>Update Password <i class='fa fa-pencil'></i></a></li>
            <li class='list-group-item'><a href='#' data-bs-toggle='modal' data-bs-target='#name' class='text-decoration-none'>Update Name <i class='fa fa-pencil'></i></a></li>
    </ul>";
   
}

function update_picture(){
    GLOBAl $db;
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['picture'])) {
        $img_name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $store = "img/";
        $extensions = array('png', 'jpg', 'jpeg', 'PNG');
        $split = explode(".", $img_name);
        $img_ext = $split[1];
        if(in_array($img_ext, $extensions)){
            move_uploaded_file($tmp_name, "$store/$img_name");
            $query = $db->prepare("UPDATE users set image = ? WHERE id = ?");
            $query->execute([$img_name, $user_id]);
            if($query){
                $_SESSION['image_success'] = "Your image is successfully updated";
                header("Location: index.php");
                exit();
            }else{
                echo "sorry query not work";
            }
        }else{
            $_SESSION['invalid_format'] = "Invalid Image Extension!";
        }
    }
   
}

update_picture();