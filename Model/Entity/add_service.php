<?php

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
    die('error');
}
    if ($_SESSION["user_role"] == 1) {

        require_once __DIR__ . '/../config/config.php';
        try {
            if (!empty($_POST["nom"])) {
                $nom = $_POST["nom"];
                $prices = $_POST["prix"];
                $prix = str_replace(',', '.', $prices);
                $options = $_POST['options'];
                $insertService = "INSERT INTO servicesandproduct (name, prices, options) VALUES (:name, :prices,:options)";
                $insert = $pdo->prepare($insertService);
                $insert->bindParam(":name", $nom, PDO::PARAM_STR);
                $insert->bindParam(":prices", $prix, PDO::PARAM_STR);
                $insert->bindParam(":options", $options, PDO::PARAM_STR);
                if ($insert->execute()) {
                    echo "Ce service a bien été ajouté";
                } else {
                    echo "erreur";
                }
            }
        } catch (Exception $e) {
           $e->getMessage();
        }
    } else {
        header("location: /garageVparrot/logout.php");
        exit();
    }
