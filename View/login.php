<?php require_once __DIR__."/../model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/maincontent.css">
    <Title>Connection au site</Title>
</head>
<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/header.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
    <div class="col-md-10  col-sm-12">
        <h1>Bienvenue cher client</h1>
        <form method="POST">
            <label for="email" >Email</label>
            <input type="email" required placeholder="email@mail.com" id="email" name="email">
            <div class='feeback' id="feedbackemail"></div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <div class='feeback' id="feedbackpassword"></div>
            <button id="connectionsubmit" >Se connecter</button>
            <div id="erreuriden"></div>
        </form>
    </div>
</div>
<script src="/garageVparrot/Controller/scripts/loginForm.js"> </script>
</body>
</html>