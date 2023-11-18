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
    if ($_SESSION['user_role'] == 1 || $_SESSION['user_role']==2) {
        try {
            if (isset($_POST["carName"])){
                $carName = $_POST["carName"];
                $brand= $_POST["brand"];
                $options = isset($_POST["options"]) ? $_POST["options"] : " ";
                $price= $_POST["price"];
                $mileage= $_POST["mileage"];
                $firstCirculation = $_POST["firstCirculation"];
                
                if (isset($_FILES['photoNames'])) {
                    $StockageDir = './uploadedfiles/';
                    $fileCount = is_array($_FILES['photoNames']['name']) ? count($_FILES['photoNames']['name']) : 1;
                    $newFileBaseName = $carName;
                    $fileNames = []; // Array to store the names of all successfully uploaded files
            
                    for ($i = 0; $i < $fileCount; $i++) {
                        if ($_FILES['photoNames']['error'][$i] == 0) {
                            $fileTmpPath = $_FILES['photoNames']['tmp_name'][$i];
                            $fileName = $_FILES['photoNames']['name'][$i];
                            $fileNameCmps = explode(".", $fileName);
                            $fileExtension = strtolower(end($fileNameCmps));
            
                            $newFileName = $newFileBaseName . ($i > 0 ? "($i)" : "") . '.' . $fileExtension; 
            
                            $dest_path = $StockageDir . $newFileName;
            
                            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                                $fileNames[] = $newFileName; // Add the new filename to the array
                            }
                        }
                    }
            
                    // After processing all files...
                    $photoNames = implode(",", $fileNames); // Create a comma-separated string of all filenames
            
                    $insert = "INSERT INTO cars (carName, brand, options, price, mileage, firstCirculation, photoNames) VALUES (:car_name, :brand, :options, :price, :mileage, :first_circulation, :photo_name)";
                    $insertion=$pdo->prepare($insert);
                    $insertion->bindParam (":car_name", $carName, PDO::PARAM_STR);
                    $insertion->bindParam (":first_circulation", $firstCirculation, PDO::PARAM_INT);
                    $insertion->bindParam (":photo_name", $photoNames, PDO::PARAM_STR); // Bind the comma-separated string of filenames
                    $insertion->bindParam (":price",$price,PDO::PARAM_STR);
                    $insertion->bindParam(":brand", $brand,PDO::PARAM_STR);
                    $insertion->bindParam (":mileage", $mileage,PDO::PARAM_STR);
                    $insertion->bindParam (":options", $options,PDO::PARAM_STR);
                    $insertion->execute(); 
                    echo "La voiture a bien été ajoutée";
                    header('Location: /garageVparrot/addcar.php');
                        exit();
            }}
            
        } catch (PDOException $e) {
            echo("". $e->getMessage());
        }
    } else {
        header('Location: /garageVparrot/logout.php');
        exit();
    }
} else {
    header('Location: /garageVparrot/logout.php');
    exit();
}
