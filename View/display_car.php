<?php require_once __DIR__ . "/../Model/cookie_creator.php";
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Nos véhicules a vendre</Title>
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            <?php
            require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
            <div id=thiswork?>  
                </div>
                <div id="fsdisp">
                <h3>Nos véhicules a vendre</h3>
                <form id="carsearchform">
    <div class="form-group">
        <label for="motClé">Mot clé :</label>
        <input type="text" id="motClé" name="motClé" class="form-control">
    </div>
    <div class="form-group">
        <label for="sort">Sort by:</label>
        <select id="sort" name="sort" class="form-control">
            <option value="last">Derniers modèles</option>
            <option value="peuCher">Prix plus bas</option>
            <option value="Plus-cher">Prix + élevé au moins élevé</option>
            <option value="lower_mileage">- de km au compteur</option>
        </select>
    </div>
    <div>
        <label for="resultatsPerPage">Nombre de résultats</label>
        <select id="resultatsPerPage" name="resultatsPerPage">
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="16">16</option>
        </select>
    </div>
    <input type="submit" class="btn-primary" value="Rechercher">
</form>

<div id="carResults"></div>

<div id="pagination">
    <button class="btn-primary" id="before">Résultats précédents</button>
    <span id="pageCount"></span>
    <button class="btn-primary"  id="next">Résultats suivant</button>
</div>
</div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
        <?php require_once __DIR__ . "/common/footer.php"; ?>

    <script src="/garageVparrot/Controller/scripts/searchcar.js"> </script>
</body>

</html>


<?php
