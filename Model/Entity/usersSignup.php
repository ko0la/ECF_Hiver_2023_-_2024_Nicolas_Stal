<?php

require_once(dirname(__FILE__) ."../../Controller/usersController.php");

// Availability check for username and Email : 
    
if(!empty($_POST["username"])) {
    $username= $_POST["username"];
    $sql ="SELECT UserName FROM  userdata WHERE UserName=:uname";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $username, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    if($query -> rowCount() > 0)
    {
    echo "<span style='color:red'> Username already exists.</span>";
    } else{ //Code for checking email availabilty
        if(!empty($_POST["emailAdress"])) {
        $email= $_POST["emailAdress"];
        $sql ="SELECT UserEmail FROM  userdata WHERE UserEmail=:email";
        $query= $dbh -> prepare($sql);
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
            $newsletter=$_POST["newsletter"]; 
            // newsletter set in binary
            if($newletter=="Yes") {
                $newsletter = 1;
            } else {
                $newsletter = 0;
            } 
            //Password Hash 
            $password= password_hash($password, PASSWORD_BCRYPT);
            // Query
            $sqlInsertQuery ="INSERT INTO users (id, firstName, name, email, username, password, phoneNumber, neswletter) VALUES (uuid(), :firstname, :name, :email, :username, :password, :phonenumber, :newsletter)";
            // prepare and BindParam
            $insert->prepare($sqlInsertQuery);
            $insert->bindParam(":firstname", $firstName, PDO::PARAM_STR);
            $insert->bindParam(":name", $name, PDO::PARAM_STR);
            $insert->bindParam(":email", $email, PDO::PARAM_STR);
            $insert->bindParam(":telephone", $phoneNumber, PDO::PARAM_INT);
            $insert->bindParam(":newsletter", $newsletter, PDO::PARAM_INT);
            $insert->execute();
        }
        }
    }
    }
    