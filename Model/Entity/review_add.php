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
    die('error');
}


require_once __DIR__ . '/../config/config.php';
try {
    if (!empty($_POST["titre"])) {
        $note = $_POST["note"];
        $titre = $_POST['titre'];
        $content = $_POST['comment'];
        $status = 2;
        $userID = $_SESSION['id'];
        $insertFeedback = "INSERT INTO feedback (content, userID, name, note, status) VALUES (:content, :userID, :name, :note, :status)";
        $insert = $pdo->prepare($insertFeedback);
        $insert->bindParam(":note", $note, PDO::PARAM_INT);
        $insert->bindParam(":userID", $userID, PDO::PARAM_STR);
        $insert->bindParam(":status", $status, PDO::PARAM_INT);
        $insert->bindParam(":name", $titre, PDO::PARAM_STR);
        $insert->bindParam(":content", $content, PDO::PARAM_STR);
        if ($insert->execute()) {
            echo "Commentaire ajouté";
        } else {
            echo "erreur";
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
}
