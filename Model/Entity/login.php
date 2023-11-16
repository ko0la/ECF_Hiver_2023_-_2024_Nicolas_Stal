<?php
//Sécurisation relative, a améliorer, die n'est pas USERFRIENDLY
if (session_status() == PHP_SESSION_NONE) {
    session_start();
};
if (session_status() == PHP_SESSION_NONE) {
    die('No active session found');
}
if (!isset($_COOKIE[session_name()])) {
    die('Session cookie is not set');
}

if (session_id() != $_COOKIE[session_name()]) {
}
require_once __DIR__ . '/../config/config.php';

try {   
    if(!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
        $password = htmlspecialchars($_POST["password"]);
    
        $sql ="SELECT id, role, email, password FROM users WHERE email=:email";
        $query= $pdo->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            if(password_verify($password, $user->password)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['user_role'] = $user->role;
                echo 'Connection autorisée';
            } else {
                echo "Identifiants Incorrects";
            }
        } else {
            echo "Identifiants Incorrects";
        }
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "Il y a une difficulté technique, nous vous prions de réessayer";
}