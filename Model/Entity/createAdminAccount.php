<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
    require_once __DIR__ . '/../config/config.php';
 
    try {   
//CODE POUR AUTOMATIQUEMENT CREER LE COMPTE ADMIN EN DATABASE //

               $username="Vparrot@gmail.com";
                $password="123456789aA";
                $role=1;
    
                //Password Hash 
                $password= password_hash($password, PASSWORD_BCRYPT);
                // Query
                $sqlInsertQuery ='INSERT INTO users (username, password, role) VALUES ( :username, :password, :role)';
                // prepare and BindParam
                $insert=$pdo->prepare($sqlInsertQuery);
                $insert->bindParam(':username', $username, PDO::PARAM_STR);
                $insert->bindParam(':password', $password, PDO::PARAM_STR);
                $insert->bindParam(":role", $role, PDO::PARAM_INT);
                $insert->execute() ;
                
                    }
     catch (PDOException $e) {
        echo "Une erreur est survenue, vous allez être redirigé vers la pagne de création de compte";
                    header("Location: /garageVparrot/signup.php");
                        exit();
    } 