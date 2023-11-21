<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Page d'accueil du garage</Title>
</head>

<body>

<?php require_once __DIR__."/common/header.php"; ?>
<div class="container-fluid">
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
        <div class="col-md-10  col-sm-12">
                <h1>Notre garage</h1>
                <p>Depuis 2008, nous proposons nos services d'entretiens pour vos véhicules</p>
                <div><h3>Nos services</h3> </div>
                <?php require_once __DIR__.'/../Model/Entity/display_public_service.php';?>
                <div><h3>Les commentaires de nos clients</h3></div>
                <?php require_once __DIR__ . '/../Model/Entity/viewReviews.php' ;?>
            </div>
        </div>
    </div>
    </div>
<?php require_once __DIR__ ."/common/footer.php";?>
</body>
</html>
</body>
</html>