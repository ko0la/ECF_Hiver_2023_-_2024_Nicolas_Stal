<?php require_once __DIR__."/../Model/cookie_creator.php";
if (isset($_SESSION["id"])) {
    if ($_SESSION["user_role"] == 1) { ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire de création de compte employé</title>
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            <?php
            require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
                <h3>Attention, ce formulaire permet de créer un compte employé, qui aura accès à la modération des contenus ainsi que les informations de contact des clients</h3>
                <div class="form">
                    <form class="vertical-form" action="/garageVparrot/Model/Entity/usersSignup.php" method="POST" id="employeesignupform">

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
                        
                    </form>
                    <div id="feedbackBDD"></div>
                        <div id="erreur"></div>
                </div>
            </div>
        </div>
        <script src="/garageVparrot/Controller/scripts/employeesignupForm.js"></script>
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