<?php
require_once __DIR__ . '/../config/config.php';
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
if (isset($_POST['car_id'])) {
    $carId = $_POST['car_id'];
    
   
    $fetchQuery = $pdo->prepare("SELECT * FROM cars WHERE id = :id");
    $fetchQuery->bindParam(":id", $carId, PDO::PARAM_INT);
    $fetchQuery->execute();
    $car = $fetchQuery->fetch(PDO::FETCH_ASSOC);
    
    if ($car) {
        
       
        if (!empty($car['photoNames'])) {
            $photoNames = explode(",", $car['photoNames']);
    
            foreach ($photoNames as $fileName) {
                $filePath = './uploadedfiles/' . $fileName;
                if (file_exists($filePath)) {
                    unlink($filePath); 
                }
            }
        }
    }
        

        $deleteCarQuery = $pdo->prepare("DELETE FROM cars WHERE id = :id");
        $deleteCarQuery->bindParam(":id", $carId, PDO::PARAM_INT);
        $deleteCarQuery->execute();


        $deleteContactQuery = $pdo->prepare("DELETE FROM contact WHERE carid = :carid");
        $deleteContactQuery->bindParam(":carid", $carId, PDO::PARAM_INT);
        $deleteContactQuery->execute();
        header("Location: /garageVparrot/addcar.php");
        exit();
    } else {
        header("Location: /garageVparrot/addcar.php");
        exit();
    }

} catch (PDOException $e) {
}} else { header("/garageVparrot/index.html");
    exit();
}} else { header("/garageVparrot/index.html");
    exit();
}

?>