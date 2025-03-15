<?php include '../../connection/db.php';

function bio() {
    GLOBAL $db;
    if(isset($_GET['bio']) && $_GET['bio'] == 'true'){
        $bio = $_POST['bio'];
        $user_id = $_SESSION['user_id'];
        $query = $db->prepare("SELECT bio FROM users WHERE id = ?");
        $query->executE([$user_id]);
        $r = $query->fetch(PDO::FETCH_OBJ);
        if(empty($r->bio)){
            $insert = $db->prepare("UPDATE users SET bio = ? WHERE id = ?");
            $insert->execute([$bio, $user_id]);
            if($insert) {
                $_SESSION['bio_success'] = "Your Bio is successfully added";
                echo json_encode(array('error' => 'success'));
            }else{
                echo json_encode(array('error' => 'error'));
            }
        }else{
            $insert = $db->prepare("UPDATE users SET bio = ? WHERE id = ?");
            $insert->execute([$bio, $user_id]);
            if($insert) {
                $_SESSION['bio_success'] = "<i class='fa fa-check-circle'></i>Your Bio is successfully updated";
                echo json_encode(array('error' => 'success'));
            }else{
                echo json_encode(array('error' => 'error'));
            }
        }
    }
}

bio();

function add_facebook_account()
{
    ini_set('display_errors', true);
    error_reporting(E_ALL);
    GLOBAL $db;
    if(isset($_GET['add_facebook']) && $_GET['add_facebook'] == true){
        $fbk_val = $_POST['fbk_val'];
        $user_id = $_SESSION['user_id'];
        $query = $db->prepare("SELECT facebook FROM users WHERE id =?");
        $query->execute([$user_id]);
        $r = $query->fetch(PDO::FETCH_OBJ);
        if(empty($r->facebook)){
            $insert = $db->prepare("UPDATE users SET facebook = ? WHERE id = ?");
            $insert->execute([$fbk_val, $user_id]);
            if($insert){
                $_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully added';
                echo json_encode(['error' => 'success']);
                exit();
            }else{
                echo json_encode(['error' => 'error']);
                exit();
            }
        }else{
            $insert = $db->prepare("UPDATE users SET facebook = ? WHERE id = ?");
            $insert->execute([$fbk_val, $user_id]);
            if($insert){
                $_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully updated';
                echo json_encode(['error' => 'success']);
                exit();
            }else{
                echo json_encode(['error' => 'error']);
                exit();
            }
        }

    }
}

add_facebook_account();

function add_linkedin_account(){
    GLOBAL $db;
    if(isset($_GET['add_linkedin']) && $_GET['add_linkedin'] == true){
        $lkd_val = $_POST['lkd_val'];
        $user_id = $_SESSION['user_id'];
        $query = $db->prepare("SELECT linkedin FROM users WHERE id =?");
        $query->execute([$user_id]);
        $r = $query->fetch(PDO::FETCH_OBJ);
        if(empty($r->linkedin)){
            $insert = $db->prepare("UPDATE users SET linkedin = ? WHERE id = ?");
            $insert->execute([$lkd_val, $user_id]);
            if($insert){
                $_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully added';
                echo json_encode(['error' => 'success']);
                exit();
            }else{
                echo json_encode(['error' => 'error']);
                exit();
            }
        }else{
            $insert = $db->prepare("UPDATE users SET linkedin = ? WHERE id = ?");
            $insert->execute([$lkd_val, $user_id]);
            if($insert){
                $_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully updated';
                echo json_encode(['error' => 'success']);
                exit();
            }else{
                echo json_encode(['error' => 'error']);
                exit();
            }
        }
    }
}

add_linkedin_account();

function change_password() {
    GLOBAL $db;
    if(isset($_GET['password']) && $_GET['password'] == true){
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $user_id = $_SESSION['user_id'];
        $query = $db->prepare("SELECT password FROM users WHERE id= ?");
        $query->execute([$user_id]);
        $r = $query->fetch(PDO::FETCH_OBJ);
        $db_password = $r->password;
        if(password_verify($current_password, $db_password)){
            $password_reg = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/";
            if(preg_match($password_reg, $new_password)){
                $new_pwd = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password = $db->prepare("UPDATE users SET password = ? WHERE id= ?");
                $update_password->execute([$new_pwd, $user_id]);
                if($update_password){
                    $_SESSION['password'] = 'Your Password is successfully updated!';
                    echo json_encode(['error' => 'success']);
                }
            }else{
                echo json_encode(['error' => 'pattern', 'msg' => '6 characters or longer. 
                Combine upper and lowercase letters and numbers']);
            }
        }else{
            echo json_encode(['error' => 'current_password_wrong', 'msg' => 'Current Password is wrong']);
        }

    }
}

change_password();

function change_name(){
    GLOBAL $db;
    if(isset($_GET['change_name']) && $_GET['change_name'] == true){
        $user_id = $_SESSION['user_id'];
        $name = $_POST['change_nagme'];
        $name_regex = "/^[a-z ]+$/i";
        if(preg_match($name_regex, $name)){
            $query ="";
        }else{
            echo json_encode(['']);
        }
    }
}