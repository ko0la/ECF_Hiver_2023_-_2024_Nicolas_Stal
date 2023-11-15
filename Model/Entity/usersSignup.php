    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
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
        echo "<span style='color:red'> Username already exists.</span>";
        } else{ //Code for checking email availabilty
            if(!empty($_POST["emailAdress"])) {
            $email= $_POST["emailAdress"];
            $sql ="SELECT email FROM  users WHERE email=:email";
            $query= $pdo ->prepare($sql);
            $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> execute();
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            if($query -> rowCount() > 0)
            {
            echo "<span style='color:red'>Email-id already exists.</span>";
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
                if($insert->execute()) {
                    // Set session variables
                    $_SESSION['user'] = [
                        'username' => $username,
                        'role' => $role,
                        // Add any other session information you need
                    ];
                    // Redirect the user
                    header("Location: /garageVparrot/index.php");
                    exit();
                }
            }
        }
    }
}
    } catch (PDOException $e) {
        echo "Une erreur est survenue, vous allez être redirigé vers la pagne de création de compte". $e->getMessage();
    }