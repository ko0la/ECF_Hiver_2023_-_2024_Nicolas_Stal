
<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/maincontent.css">
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
                    <a href=""> Ajouter un véhicule à vendre</a>
                    <hr>';
                } else if  ($_SESSION["user_role"] == 2)  {
                    echo '<a href="">Ajouter un véhicule à vendre</a><hr>';
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

</body>
</html>
</body>
</html>