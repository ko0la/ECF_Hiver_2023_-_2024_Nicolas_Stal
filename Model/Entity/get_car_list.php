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
            $query = "SELECT carName, brand, options, id FROM cars ORDER BY id DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch())
{
    echo "Modèle " . $row["carName"]. " -Marque " . $row["brand"]. " - Options: " . $row["options"]. "<br>" . '<form action="/garageVparrot/Model/Entity/delete_car.php" method="post">
    <input id="car_id" type="hidden" name="car_id" value='.$row["id"].'>
    <input class btn-warning type="submit" name="delete_car" value="Supprimer Cette voiture">
</form><hr>';
} } catch (PDOException $e) {
    echo "une erreur s'est produite"; }
} else { header("/garageVparrot/index.html");
    exit();
}} else { header("/garageVparrot/index.html");
    exit();
}