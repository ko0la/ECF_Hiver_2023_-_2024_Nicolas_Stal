<?php 
    require_once __DIR__ . '/../config/config.php';
        echo"<div class=small-txt>";
        try {
            $gettable = "SELECT * from businesshours";
            $get = $pdo->prepare($gettable);
            $get->execute();
            function dayAssociationShort($int)
            {
                $days = [
                    1 => 'Lu',
                    2 => 'Ma',
                    3 => 'Me',
                    4 => 'Je',
                    5 => 'Ve',
                    6 => 'Sa',
                    7 => 'Di'
                ];
                return isset($days[$int]) ? $days[$int] : null;
            }

            while ($row = $get->fetch(PDO::FETCH_ASSOC)) {
                $day = dayAssociationShort($row["id"]);
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
                        echo "$day $morningHours $afternoonHours";
                    } else {
                        echo "$day $morningHours";
                    }
                } else {
                    echo "$day fermé";
                }
                if ($day=="Je" ) {echo "<div class-col-md12>";} else {}
                if ($day=="Di") {
                    echo " Tél : 0123456789 ";

            }echo " | ";}

            echo "</div>";
            echo "</div>";
        } catch (PDOException $e) {
            echo "Error: ";
        } 