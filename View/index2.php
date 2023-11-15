<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil du garage</title>
    <!-- Don't forget to include Bootstrap CSS and your custom styles here -->
</head>
<body>
    <?php require_once __DIR__."/common/header.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
                <?php require_once __DIR__."/common/sidebar.php"; ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <h1>Notre garage</h1>
                <p>Depuis 2008, nous proposons nos services d'entretiens pour vos véhicules</p>
            </div>
        </div>
    </div>
    <!-- Don't forget to include Bootstrap JS and jQuery here -->
</body>
</html>