<?php require_once __DIR__."/../Model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire d'inscription au site</title>
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            <?php
            require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
                <div class="form">
                    <form action="/garageVparrot/Model/Entity/usersSignup.php" method="POST">

                        <label for="username">Nom d'utilisateur :</label>
                        <span id='usernameError'></span>
                        <input type="text" name="username" id="username">
                        <span>Seul le nom d'utilisateur sera visible aux visiteurs du site</span>
                        <label for="name">Nom :</label>
                        <div id='nameError'></div>
                        <input type="text" name="name" id="name" required placeholder="Nom">
                        <label for="firstName">Prenom :</label>
                        <div id='firstnameError'></div>
                        <input type="text" name="firstName" id="firstName" required placeholder="Prenom">
                        <label for="email">Adresse mail :</label>
                        <div id='emailError'></div>
                        <input type="email" name="email" id="email" required placeholder="email@mail.com">
                        <label for="password">Mot de passe :</label>
                        <div id='passwordError'></div>
                        <input type="password" name="password" id="password">
                        <label for="phoneNumber">Numéro de téléphone :</label>
                        <div id='phoneNumberError'></div>
                        <input type="text" name="phoneNumber" id="phoneNumber">
                        <button id="signupsubmit" type="submit">S'inscrire</button>
                        <div id="erreur">
                    </form>
                </div>
            </div>
        </div>
        <script src="/garageVparrot/Controller/scripts/signupForm.js"></script>
</body>

</html>