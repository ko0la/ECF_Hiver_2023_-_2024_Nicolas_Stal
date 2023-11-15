<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/maincontent.css">
    <Title>Formulaire de connexion</Title>
</head>
<body>
    <?php require_once __DIR__."/common/header.php";
    require_once __DIR__."/common/sidebar.php"?>
    <div class="content">
    <h1>Bienvenue cher client</h1>
    <form action="" method="post">
        <label for="email" >Email</label>
        <input type="email" required placeholder="email@mail.com" id="emailAdress" name="emailAdress">
        <label for="text">Mot de passe</label>
        <input type="password" name="password" id="password" required minlength="9">
        <button type="submit">Se connecter</button>
        </div>
    </form>
</body>
</html>