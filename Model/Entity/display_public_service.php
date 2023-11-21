<?php 
require_once __DIR__ ."/../config/config.php";
try {
$statement ="SELECT * from servicesandproduct";
$query=$pdo->prepare($statement);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $id = $row['id'];
        $name= $row['name'];
        $prices= $row['prices'];
        $options = $row['options'];
        echo '<div class="justify-content-center darker col-md-5">'.$name.'<div class="justify-content darker col-md-5">'.$prices.'€</div></div><div class="row justify-content darker col-md-10 col-sm-12">'.$options.'</div>
        ' ;if (isset($_SESSION["user_role"])) {
        if ($_SESSION["user_role"]==1){ echo '<div class="row col-md-10" ><form action="/garageVparrot/Model/Entity/delete_service.php" method="POST">
            <input type="hidden" name="service_id" value="'.$id.'"/>
            <input type="submit" class="btn btn-warning text-center"
            value="Supprimer le service"></form>
            ';} else{}} else{} }
} catch (PDOException $e) {
    echo "Une erreur technique est survenue";}