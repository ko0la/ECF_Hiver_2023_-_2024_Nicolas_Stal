<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/maincontent.css">
    <Title>Page d'accueil du garage</Title>
</head>

<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/commonview.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
        <div class="col-md-10  col-sm-12">
                <h1>Notre garage</h1>
                <p>Depuis 2008, nous proposons nos services d'entretiens pour vos véhicules</p>
                <div><h3>Nos services</h3> </div>
                <div><h3>Les commentaires de nos clients</h3></div>
                <?php require_once __DIR__ . '/../Model/Entity/viewReviews.php' ;?>
            </div>
        </div>
    </div>
    </div>

</body>
</html>
</body>
</html>