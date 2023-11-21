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
        echo "<table class='table table-bordered>'";
        echo "<tr><th>Jour</th><th>Horaires</th></tr>";
        try {
            $gettable = "SELECT * from businesshours";
            $get = $pdo->prepare($gettable);
            $get->execute();
            function dayAssociation($int)
            {
                $days = [
                    1 => 'Lundi',
                    2 => 'Mardi',
                    3 => 'Mercredi',
                    4 => 'Jeudi',
                    5 => 'Vendredi',
                    6 => 'Samedi',
                    7 => 'Dimanche'
                ];
                return isset($days[$int]) ? $days[$int] : null;
            }

            while ($row = $get->fetch(PDO::FETCH_ASSOC)) {
                $day = dayAssociation($row["id"]);
                $break = $row["secondperiod"];
                $open = $row["open"];
                $openAM = $row["openingmorning"];
                $closeAM = $row["closingmorning"];
                $openPM = $row["openingafternoon"];
                $closePM = $row["closingafternoon"];

                $morningHours = $openAM . ' - ' . $closeAM;
                $afternoonHours = $openPM . ' - ' . $closePM;
                if ($open == 0) {
                    if ($break == 0) {
                        echo "<tr><td>$day</td><td>$morningHours  |  $afternoonHours</td></tr>";
                    } else {
                        echo "<tr><td>$day</td><td>$morningHours</td></tr>";
                    }
                } else {
                    echo "<tr><td>$day</td><td>Fermé</td></tr>";
                }
            }
            

            echo "</table>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
