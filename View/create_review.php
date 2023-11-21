<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
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
</div>
    
    </div> </div>
    <?php require_once __DIR__."/common/footer.php";?>
    <script src="/garageVparrot/Controller/scripts/create_review.js"> </script>
</body>
</html>