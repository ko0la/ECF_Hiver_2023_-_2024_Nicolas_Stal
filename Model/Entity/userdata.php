<?php
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    require_once __DIR__ . "/../config/config.php";
    $prepareFetch = "SELECT username , email, name, firstName, phoneNumber from Users where id = :id";
    $stmt = $pdo->prepare($prepareFetch);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $email = $row["email"];
    $username = $row["username"];
    $name = $row["name"];
    $firstName = $row["firstName"];
    $phoneNumber =   $row["phoneNumber"];
    echo '<div> Nom d\'utilisateur : ' . $username . '</div><hr>
    <div> Email : ' . $email . '</div><hr><div>Nom : ' . $name . '</div><hr>
    <div> Prénom : ' . $firstName . '</div><hr><div> Numéro de téléphone : ' . $phoneNumber . '</div><hr>';
} else {
    header('Location: /garageVparrot/logout.php');
    exit();
}
