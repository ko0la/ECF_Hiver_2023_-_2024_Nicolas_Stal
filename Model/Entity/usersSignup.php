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

    // Availability check for username and Email : 
    try {   
    if(!empty($_POST["username"])) {
        $username= $_POST["username"];
        $sql ="SELECT UserName FROM  users WHERE UserName=:uname";
        $query= $pdo -> prepare($sql);
        $query-> bindParam(':uname', $username, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if($query -> rowCount() > 0)
        {
        echo "Ce nom d'utilisateur est déja utilisé";
        } else{ //Code for checking email availabilty
            if(!empty($_POST["email"])) {
            $email= $_POST["email"];
            $sql ="SELECT email FROM  users WHERE email=:email";
            $query= $pdo ->prepare($sql);
               $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> execute();
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            if($query -> rowCount() > 0)
            {
            echo "Cette email n'est pas disponible";
            } else{ //Entering registration in database : binding post values in variables, email and username already bound.
                $firstName=$_POST["firstName"];
                $name=$_POST["name"];
                $password=$_POST["password"];
                $phoneNumber=$_POST["phoneNumber"];
                $role=3;
                
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
                $insert->bindParam(":phonenumber", $phoneNumber, PDO::PARAM_INT);
                $insert->bindParam(":role", $role, PDO::PARAM_INT);
                if ($insert->execute()) {
                
                    $sqlFetchRole = ("SELECT id, role FROM users WHERE email = :emailfetch");
                    $emailFetchRole= $_POST["email"];
                    $sqlfetch=$pdo->prepare($sqlFetchRole);
                    $sqlfetch->bindParam(':emailfetch', $emailFetchRole, PDO::PARAM_STR);
                    $sqlfetch->execute();
                    
                    if ($sqlfetch->rowCount() > 0) {
                        // Stockez les informations de l'utilisateur dans les variables de session
                        $user = $sqlfetch->fetch(PDO::FETCH_OBJ);
                        $_SESSION['id'] = $user->id;
                        $_SESSION['user_role'] = $user->role;
                        echo 'Connection autorisée';
                    } else {
                        echo "Nous n'arrivons pas à créer votre session,nous vous prions de nous excuser pour le problême technique";    
                    } } else {
                        echo "Une erreur est survenue, veuillez réessayer" ;
                    }
                }
            }
        }
    }
}
     catch (PDOException $e) {
        echo "Une erreur technique est survenue, vous allez être redirigé vers la page de création de compte";
                    header("Location: /garageVparrot/signup.php");
                        exit();
    }