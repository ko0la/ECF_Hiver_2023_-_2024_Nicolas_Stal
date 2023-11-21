<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Connection au site</Title>
</head>
<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/header.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
    <div class="col-md-10  col-sm-12">
        <h3>Formulaire de connexion</h3>
        <form method="POST">
            <label for="username" >Email utilisateur:</label>
            <input type="username" required placeholder="Nom d'utilisateur" id="username" name="username">
            <div class='feeback' id="feedbackusername"></div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <div class='feeback' id="feedbackpassword"></div>
            <button id="connectionsubmit" >Se connecter</button>
            <div id="erreuriden"></div>
        </form>
    </div>
</div>
<script src="/garageVparrot/Controller/scripts/loginForm.js"> </script>
<?php require_once __DIR__."/common/footer.php"?>
</body>
</html>