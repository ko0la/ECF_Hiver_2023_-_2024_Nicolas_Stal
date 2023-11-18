<?php require_once __DIR__."/../Model/cookie_creator.php";
if (isset($_SESSION["id"])) {
    if ($_SESSION["user_role"] == 1) { ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Modifier les services</title>
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            <?php
            require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
                <h3>Vous souhaitez ajouter un nouveau service ?</h3>
                <div class="form">
                <form  method="post" class="vertical-form"> <span id="ajoutreussi"> </span>
                <label for="name"> Nom du service :</label>
                <div id="feedbackname"></div>
                <input type="text" name="name" id="name" >
                <label for="prix">Le prix du service</label>
                <div id="feedbackprix"></div>
                <input for="prix" name="prix" id="prix">
                <label for="options">Details</label>
                <div id="feedbackoptions"></div>
                <textarea class="col-12"  name="options" id="options" placeholder="Décrivez ici le service plus en détail"></textarea>
                <br>
                <input type="submit" class="btn-primary" id="addservice" value="Ajouter le service">
            
            </form>
            <div id="renvoiBDD"></div>
                </div>
            </div>
        </div>
        <script src="/garageVparrot/Controller/scripts/addservice.js"></script>
</body>

</html>
<?php }
else {
    header ('Location: /garageVparrot/logout.php') ;
    exit();
} } else {
    header ('Location: /garageVparrot/logout.php') ;
    exit();
}