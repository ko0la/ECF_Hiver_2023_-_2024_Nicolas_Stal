<?php require_once __DIR__."/../Model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire de contact</title>
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
                <div class="form" id="form">
                    <form class="vertical-form" action="" method="POST" >
                        <label for="name">Nom :</label>
                        <div id='nameError'></div>
                        <input type="text" name="name" id="name" required placeholder="Nom">
                        <label for="firstName">Prenom :</label>
                        <div id='firstnameError'></div>
                        <input type="text" name="firstName" id="firstName" required placeholder="Prenom">
                        <label for="email">Adresse mail :</label>
                        <div id='emailError'></div>
                        <input type="email" name="email" id="email" required placeholder="email@mail.com">
                        <label for="phoneNumber">Numéro de téléphone :</label>
                        <div id='phoneNumberError'></div>
                        <input type="text" name="phoneNumber" id="phoneNumber">
                        <label for="contact">Votre demande porte sur  : </label>
                <div id="feedbackcomment"></div>
                        <textarea class="col-12"  name="contact" id="contact" placeholder="Tapez ici la raison de votre demande de contact"></textarea>
                        <button id="signupsubmit" type="submit">Nous contacter</button>
</div>
                        <div id="erreur">
                    </form>
                </div>
            </div>
        </div> 
    
        <script src="/garageVparrot/Controller/scripts/contactForm.js"></script>
        <?php require_once __DIR__ . "/common/footer.php" ?>
</body>
</html>