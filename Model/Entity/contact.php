<?php
    require_once __DIR__ . '/../config/config.php';


    try {   
    if(!empty($_POST["name"])) { 
                $firstName=$_POST["firstName"];
                $name=$_POST["name"];
                $phoneNumber=$_POST["phoneNumber"];
                $email = $_POST["email"];
                if(!empty($_POST["carid"])) {

                    $carID=$_POST['carid'];
                } else {$carID=null;}
                $contact1 = $_POST["contact"];
                $contact= htmlspecialchars($contact1);
                $sqlInsertQuery ='INSERT INTO contact (firstName, name, email, phoneNumber, contact, carid) VALUES ( :firstname, :name, :email, :phonenumber,:contact ,:carid)';
    
                $insert=$pdo->prepare($sqlInsertQuery);
                $insert->bindParam(":firstname", $firstName, PDO::PARAM_STR);
                $insert->bindParam(":name", $name, PDO::PARAM_STR);
                $insert->bindParam(":email", $email, PDO::PARAM_STR);
                $insert->bindParam(":phonenumber", $phoneNumber, PDO::PARAM_STR);
                $insert->bindParam(":carid", $carID, PDO::PARAM_INT);
                $insert->bindParam(":contact", $contact1, PDO::PARAM_STR);
                if ($insert->execute()) {
                        echo 'Connection autorisée';
                    } else {
                        echo "Nous n'arrivons pas à créer votre session,nous vous prions de nous excuser pour le problême technique";    
                    } } else {
                        echo "Une erreur est survenue, veuillez réessayer" ;
                    }
                }
     catch (PDOException $e) {
        echo "Une erreur technique est survenue, veuillez réessayer"; echo $e->getMessage();
    }