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
require_once(dirname(__FILE__) . "/../config/config.php");
if (isset($_SESSION['user_role'])) {
if ($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 1) {
    try {
        $valide=1;
        $id = $_POST['comment_id'];
        var_dump($id);
        var_dump($valide);
        $stmt = "UPDATE feedback SET status = :new_value WHERE id = :id";
        $query = $pdo->prepare($stmt);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':new_value', $valide, PDO::PARAM_INT);
        $query->execute();
        header('Location: ../../reviews.php');
       exit();
    } catch (PDOException $e) {
        $e->getMessage();
       header('Location: ../../reviews.php');
        exit();
    }
} else {
    header ('Location: /garageVparrot/logout.php') ;
    exit();
} } else {
    header ('Location: /garageVparrot/logout.php') ;
    exit();
}