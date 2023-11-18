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
            // Code for checking username availability
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
                    // Code for checking email availability
                    if (!empty($_POST["email"])) {
                        $email = $_POST["email"];
                        $sql = "SELECT email FROM  users WHERE email=:email";
                        $query = $pdo->prepare($sql);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            echo "Cette email n'est pas disponible";
                        } else {
                            // Code for entering registration in database
                            $firstName = $_POST["firstName"];
                            $name = $_POST["name"];
                            $password = $_POST["password"];
                            $phoneNumber = $_POST["phoneNumber"];
                            $role = 2;

                            // Password Hash
                            $password = password_hash($password, PASSWORD_BCRYPT);

                            // Query
                            $sqlInsertQuery = 'INSERT INTO users (id, firstName, name, email, username, password, phoneNumber, role) VALUES (uuid(), :firstname, :name, :email, :username, :password, :phonenumber, :role)';
                            // Prepare and BindParam
                            $insert = $pdo->prepare($sqlInsertQuery);
                            $insert->bindParam(':username', $username, PDO::PARAM_STR);
                            $insert->bindParam(':password', $password, PDO::PARAM_STR);
                            $insert->bindParam(":firstname", $firstName, PDO::PARAM_STR);
                            $insert->bindParam(":name", $name, PDO::PARAM_STR);
                            $insert->bindParam(":email", $email, PDO::PARAM_STR);
                            $insert->bindParam(":phonenumber", $phoneNumber, PDO::PARAM_INT);
                            $insert->bindParam(":role", $role, PDO::PARAM_INT);
                            $insert->execute();
                            echo 'Compte créé avec succès';
                        }
                    }
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