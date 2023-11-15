<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire d'inscription au site</title>   
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
    <?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
                require_once __DIR__."/../Model/Entity/usersSignup.php"?>
</head>
<body>
<?php include 'common/header.php';?>
    <div class="form">
    <form action="/garageVparrot/Model/Entity/usersSignup.php" method="POST">
        
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username">
        <span>Seul le nom d'utilisateur sera visible aux visiteurs du site</span>
        <label for="nom">Nom :</label>
        <input type="text" name="name" id="name" required placeholder="Nom">
        <label for="prenom" >Prenom :</label>
        <input type="text" name="firstName" id="firstName" required placeholder="Prenom">
        <label for="email">Adresse mail :</label>
        <input type="email" name="emailAdress" id="emailAdress" required  placeholder="email@mail.com">
        <label for="password" >Mot de passe :</label>
        <input type="password" required length="9" name="password" id="password">
        <label for="phoneNumber">Numéro de téléphone :</label>
        <input type="text" name="phoneNumber" id="phoneNumber" >
        <button type="submit">S'inscrire</button>
        
    </form>
    </div>
</body>
</html>