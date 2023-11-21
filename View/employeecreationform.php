<?php require_once __DIR__."/../Model/cookie_creator.php";
if (isset($_SESSION["username"])) {
    if ($_SESSION["user_role"] == 1) { ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire de création de compte employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
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

                        <label for="username">Email de l'employé :</label>
                        <span id='usernameError'></span>
                        <input type="text" name="username" id="username">
                        <label for="password">Mot de passe :</label>
                        <div id='passwordError'></div>
                        <input type="password" name="password" id="password">
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