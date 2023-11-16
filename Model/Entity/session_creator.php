<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
// Récupérez les autres informations de l'utilisateur depuis la base de données
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
    // Redirigez l'utilisateur
    header("Location: /garageVparrot/index.php");
    exit();
} else {
    echo "Nous n'arrivons pas à créer votre session.";
    header("Location: /garageVparrot/index.php");
    exit();    
}