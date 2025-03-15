<?php
include '../connection/db.php';

function login() {
    GLOBAL $db;

    // Vérifier si la requête est bien POST et contient les champs nécessaires
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_email'], $_POST['login_password'])) {

        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        // Sélectionner email, password et id dans la base
        $query = $db->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $query->execute([$email]);

        if ($query->rowCount() > 0) {
            $r = $query->fetch(PDO::FETCH_OBJ); // Récupération en objet

            // Vérifier si la colonne `password` existe avant d'y accéder
            if (isset($r->password)) {
                $db_password = $r->password;

                // Comparer les mots de passe
                if (password_verify($password, $db_password)) { // Si pas hashé
                // Si le mot de passe est hashé en BDD, utiliser `password_verify()`
                // if (password_verify($password, $db_password)) { 

                    $_SESSION['user_id'] = $r->id;

                    echo json_encode(array('error' => 'success', 'msg' => 'profile/index.php'));
                } else {
                    echo json_encode(array('error' => 'no_password', 'msg' => 'Please enter correct password!'));
                }
            } else {
                echo json_encode(array('error' => 'db_error', 'msg' => 'Password column not found in database.'));
            }
        } else {
            echo json_encode(array('error' => 'no_email', 'msg' => 'Please enter correct email!'));
        }
    } else {
        echo json_encode(array('error' => 'invalid_request', 'msg' => 'Invalid request method.'));
    }
}

login();
