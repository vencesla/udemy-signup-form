<?php
include '../connection/db.php';

function check_email() {
    GLOBAL $db;
    if(isset($_POST['check_email'])){
        $email = $_POST['check_email'];
        $query = $db->prepare("SELECT email from users WHERE email= ?");
        $query->execute(array($email));
        if($query->rowCount() == 0){
            echo json_encode(array('error' => 'email_success'));
        }else {
            echo json_encode(array('error' => 'email_fail', 'message' => 'Sorry
            this email is already exist'));
        }
    }
} // close check_email emthod

check_email();

function signup_submit(){
    GLOBAL $db;
    if(isset($_GET['signup']) && $_GET['signup'] == true) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = $db->prepare("INSERT INTO users(name, email, password)
        VALUES (?,?,?)");
        $query->execute([$name,$email, $password]);
        if($query){
            $_SESSION['user_name'] = $name;
            echo json_encode(['error' => 'success', 'msg' => 'success.php']);
        }
    }
}

signup_submit();

?>