<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (session_status() == PHP_SESSION_NONE) {
    die('No active session found');
}
if (!isset($_COOKIE[session_name()])) {
    die('Session cookie is not set');
}

if (session_id() != $_COOKIE[session_name()]) {
    die('');
}

require_once __DIR__ . '/../config/config.php';

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == 1) {
        try {
           
            if (!empty($_POST["username"])) {
                $username = $_POST["username"];
                $sql = "SELECT UserName FROM  users WHERE UserName=:uname";
                $query = $pdo->prepare($sql);
                $query->bindParam(':uname', $username, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    echo "Ce nom d'utilisateur est déja utilisé";
                } else {
                           $password=$_POST["password"];
                            $role = 2;
                            $password = password_hash($password, PASSWORD_BCRYPT);
                            $sqlInsertQuery = 'INSERT INTO users ( username, password, role) VALUES (:username, :password, :role)';
                            $insert = $pdo->prepare($sqlInsertQuery);
                            $insert->bindParam(':username', $username, PDO::PARAM_STR);
                            $insert->bindParam(':password', $password, PDO::PARAM_STR);
                            $insert->bindParam(":role", $role, PDO::PARAM_INT);
                            $insert->execute();
                            echo 'Compte créé avec succès';
                        }
                    }  
        } catch (PDOException $e) {
            echo "Une erreur technique est survenue";
        }
    } else {
        header('Location: /garageVparrot/logout.php');
        exit();
    }
} else {
    header('Location: /garageVparrot/logout.php');
    exit();
}