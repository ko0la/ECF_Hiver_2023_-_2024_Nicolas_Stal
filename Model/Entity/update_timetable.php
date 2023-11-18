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
    if ($_SESSION['user_role'] == 1) {
        try {
            $day_id = $_POST['day_id'];

            if (isset($_POST['open' . $day_id])) {
                $open = 0;
            } else {
                $open = 1;
            }

            if (isset($_POST['secondperiod' . $day_id])) {
                $secondperiod = 0;
            } else {
                $secondperiod = 1;
            }

            $openingmorning = !empty($_POST['opening_time' . $day_id]) ? date("H:i", strtotime($_POST['opening_time' . $day_id])) : NULL;
            $closingmorning = !empty($_POST['closing_time' . $day_id]) ? date("H:i", strtotime($_POST['closing_time' . $day_id])) : NULL;
            $openingafternoon = !empty($_POST['afternoon_opening_time' . $day_id]) ? date("H:i", strtotime($_POST['afternoon_opening_time' . $day_id])) : NULL;
            $closingafternoon = !empty($_POST['afternoon_closing_time' . $day_id]) ? date("H:i", strtotime($_POST['afternoon_closing_time' . $day_id])) : NULL;

            $stmnt = "UPDATE businesshours SET open = :open, secondperiod = :secondperiod, openingmorning = :openingmorning, closingmorning = :closingmorning, openingafternoon = :openingafternoon, closingafternoon = :closingafternoon WHERE id = :id";

            $update = $pdo->prepare($stmnt);
            $update->bindParam(':open', $open, PDO::PARAM_INT);
            $update->bindParam(':secondperiod', $secondperiod, PDO::PARAM_INT);
            $update->bindParam(':openingmorning', $openingmorning);
            $update->bindParam(':closingmorning', $closingmorning);
            $update->bindParam(':openingafternoon', $openingafternoon);
            $update->bindParam(':closingafternoon', $closingafternoon);
            $update->bindParam(':id', $day_id, PDO::PARAM_INT);
            if (!$update->execute()) {
                header("Location: /garageVparrot/businesshours.php");
                exit();
            }

            header("Location: /garageVparrot/businesshours.php");
            exit();
        } catch (PDOException $e) {
            echo "Une erreur technique est survenue: ";
        }
    } else {
        header('Location: /garageVparrot/logout.php');
        exit();
    }
} else {
    header('Location: /garageVparrot/logout.php');
    exit();
}
