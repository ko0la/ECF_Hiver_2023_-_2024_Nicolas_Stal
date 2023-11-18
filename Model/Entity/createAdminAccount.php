<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
    require_once __DIR__ . '/../config/config.php';
 
    // Availability check for username and Email : 
    try {   
//CODE POUR AUTOMATIQUEMENT CREER LE COMPTE ADMIN EN DATABASE //
                $username="Vparrot";
                $email="Vparrot@gmail.com";
                $firstName="Vincent";
                $name="Parrot";
                $password="123456789aA";
                $phoneNumber="0123456789";
                $role=1;
    
                //Password Hash 
                $password= password_hash($password, PASSWORD_BCRYPT);
                // Query
                $sqlInsertQuery ='INSERT INTO users (id, firstName, name, email, username, password, phoneNumber, role) VALUES (uuid(), :firstname, :name, :email, :username, :password, :phonenumber, :role)';
                // prepare and BindParam
                $insert=$pdo->prepare($sqlInsertQuery);
                $insert->bindParam(':username', $username, PDO::PARAM_STR);
                $insert->bindParam(':password', $password, PDO::PARAM_STR);
                $insert->bindParam(":firstname", $firstName, PDO::PARAM_STR);
                $insert->bindParam(":name", $name, PDO::PARAM_STR);
                $insert->bindParam(":email", $email, PDO::PARAM_STR);
                $insert->bindParam(":phonenumber", $phoneNumber, PDO::PARAM_STR);
                $insert->bindParam(":role", $role, PDO::PARAM_INT);
                $insert->execute() ;
                
                    }
     catch (PDOException $e) {
        echo "Une erreur est survenue, vous allez être redirigé vers la pagne de création de compte";
                    header("Location: /garageVparrot/signup.php");
                        exit();
    } 