
<?php
// Database settings
$driver='pdo_mysql';
$db="carshop";
$dbhost="localhost";
$dbport=3312    ;
$dbuser="root";
$dbpasswd="714825936";
 
$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);


?>