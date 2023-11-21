<?php require_once __DIR__ . "/../Model/cookie_creator.php";
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Les demandes de contact</Title>
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            <?php
            require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
                <h3>Les demandes de contact que vous avez reçu</h3>
                <?php require_once __DIR__ . "/../Model/Entity/contactask.php"; ?>
            </div>
        </div>
    </div>            </div>
        </div>
    </div>
                <?php require_once __DIR__ . "/common/footer.php"; ?>
                

</body>

</html>


<?php

        