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
    if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) {
        try {
            $query = "SELECT  * FROM  contact ORDER BY id DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch())
            {
                echo "Nom: " . $row["name"]. " Prénom " . $row["firstName"]. " <hr> - Telephone  " . $row["phoneNumber"]. " Email :". $row["email"]. "<br>" .
                "Objet de la demande :" .$row["contact"]. "<br>".    
                '<form action="/garageVparrot/Model/Entity/delete_contact.php" method="post">
                <input id="contact_id" type="hidden" name="id" value='.$row["id"].'>
                <input class="btn-warning" type="submit" value="Supprimer cette demande de contact">
                </form>'; 
                if (isset($row["carid"])) {
                    $query2 = "select options, carName, brand, mileage, firstCirculation from cars where id =:id";
                    $stmt2 = $pdo->prepare($query2);
                    $stmt2->bindParam(":id", $row["carid"], PDO::PARAM_INT);
                    $stmt2->execute();
                    $row2 = $stmt2->fetch();
                    echo "<div> Cette demande portait sur la voiture suivante : <br>". $row2["carName"]. " Marque: ". $row2["brand"]."<br>".
                    $row2["mileage"]." Km au compteur et mise en circulation en " . $row2["firstCirculation"]."<br>"."Cette voiture dispose des options suivantes : ".$row2["options"]."<hr><br> </div>";
                }
            }
        } catch (PDOException $e) {
            echo "une erreur technique est survenue";
        }
    }
} else {
    echo "vous n'avez pas accès à cette ressource " ;
}
?>