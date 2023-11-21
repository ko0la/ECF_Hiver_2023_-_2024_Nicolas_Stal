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
    if(!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password =$_POST["password"];
    
        $sql ="SELECT id, role, username, password FROM users WHERE username=:username";
        $query= $pdo->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() > 0) {
            $user = $query->fetch(PDO::FETCH_OBJ);
            
            if(password_verify($password, $user->password)) {
                $_SESSION['username'] = $user->username;
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
    echo $e->getMessage();
    echo "Il y a une difficulté technique, nous vous prions de réessayer";
}