
<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Mon Espace Modération</Title>
</head>

<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/header.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
        <div class="col-md-10  col-sm-12">
               <?php
               if (isset($_SESSION["user_role"])) {
                if ($_SESSION["user_role"] == 1){
                    echo '
                    <a href="/garageVparrot/businesshours.php">Modifier les horaires</a>
                    <hr>
                    <a href="/garageVparrot/createemployees.php">Créer employé</a>
                    <hr>
                    <a href="/garageVparrot/create_service.php">Modifier services</a>
                    <hr>
                    <a href="/garageVparrot/addcar.php"> Ajouter un véhicule à vendre</a>
                    <hr>
                    <a href="/garageVparrot/getcontact.php"> Voir les demandes de contact </a>' ;
                } else if  ($_SESSION["user_role"] == 2)  {
                    echo '<a href="">Ajouter un véhicule à vendre</a><hr>
                    <a href="/garageVparrot/getcontact.php"> Voir les demandes de contact </a>' ;
                }
               } else {
                header('Location: /garageVparrot/logout.php');
                exit();
               }
               ?>
            </div>
        </div>
    </div>
    </div>
<?php require_once __DIR__.'/common/footer.php'?>
</body>
</html>
</body>
</html>