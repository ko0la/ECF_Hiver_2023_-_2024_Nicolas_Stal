<?php
// Database settings
try {
$driver='pdo_mysql';
$db="carshop";
$dbhost="localhost";
$dbport=3312    ;
$dbuser="carshopuser";
$dbpasswd="91827364550";
 
$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
