<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/maincontent.css">
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
    <Title>Laisser un avis</Title>
</head>
<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/header.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
    <div class="col-md-10  col-sm-12">
        <h2> Formulaire pour donner votre avis sur notre garage</h2>

    <?php   if (isset($_SESSION["user_role"])) { ?>
        <hr>
            <form action="/garageVparrot/Model/Entity/review_add.php" method="post" class="vertical-form" id="successReview">
                <label for="name"> Titre de votre revue :</label>
                <div id="feedbacktitre"></div>
                <input type="text" name="name" id="name" >
                <label for="note">La note que vous nous donnez, allant de 1 a 5 :</label>
                <div id="feedbacknote"></div>
                <input for="note" name="note" id="note">
                <br>
                <label for="comment">Votre commentaire : </label>
                <div id="feedbackcomment"></div>
                
                <textarea class="col-12"  name="comment" id="comment" placeholder="Veuillez tapez votre commentaire ici, nous filtrons les propos obscènes ou illégaux"></textarea>
                <br>
                <input type="submit" class="btn-primary" id="submitreview" value="Envoyez votre commentaire">
            
            </form>
            <div id="renvoiBDD"></div>
    <?php } else { ?> 
        <div>
    <p class="text-center">Vous devez être connecté pour laisser un avis:</p>
    <div class="row justify-content-center">
        <div class="col-md-5 col-6">
            <a href="/garageVParrot/login.php" class="btn btn-primary btn-block mb-2">Se connecter</a>
        </div>
        <div class="col-md-5 col-6">
            <a href="/garageVParrot/signup.php" class="btn btn-secondary btn-block mb-2">S'inscrire</a>
        </div>
    </div>
</div>
    <?php } ?>
    </div> </div>
    <script src="/garageVparrot/Controller/scripts/create_review.js"> </script>
</body>
</html>