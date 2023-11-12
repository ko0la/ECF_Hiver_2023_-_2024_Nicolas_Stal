<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Formulaire d'inscription au site</title>   
    <?php require_once "Git\Model\Entity\usersSignup.php" ?>
</head>
<body>
    <div class="form">
    <form action="../Model/Entity/usersSignup.php" method="POST">
        
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="userName" id="userName">
        <span>Seul le nom d'utilisateur sera visible aux visiteurs du site</span>
        <label for="nom"></label>
        <input type="text" name="name" id="name" required placeholder="Nom">
        <label for="prenom" ></label>
        <input type="text" name="firstName" id="firstName" required placeholder="Prenom">
        <label for="email"></label>
        <input type="email" name="emailAdress" id="emailAdress" required  placeholder="email@mail.com">
        <label for="password" ></label>
        <input type="password" required length="9" name="password" id="password">
        <label for="phoneNumber">Numéro de téléphone</label>
        <input type="text" name="phoneNumber" id="phoneNumber" >
        <input type="checkbox" name="newsletter" id="consentement">J'accepte de recevoir la newsletter.
        <button type="submit">S'inscrire</button>
        
    </form>
    </div>
</body>
</html>