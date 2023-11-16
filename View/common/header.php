<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

    <!-- Lien vers librairie bootstrap et jquery <html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <!--  <title>Document</title>
</head>
<body> -->
    <header>
        <div class="row d-flex">
        <div class="col-3 bg-dark justify-content-center d-flex pr-0 pl-0">
        <img class="logo-img" src="/garageVparrot/public/images/LogoSmall.webp" alt="Logo"></div>
        <div class="col-9 pr-0 pl-0">
        <nav class="navbar navbar-light bg-dark justify-content-center">
            <div class="nav-links ">
                <a href="/garageVparrot/index.php">Page d'acceuil</a>
                <?php 
                if(isset($_SESSION['id'])) { // check if user is logged in
                ?>
                    <a href="/garageVparrot/profile.php">Mon profil</a>
                    <a href="/garageVparrot/logout.php">Se déconnecter</a>
                <?php 
                } else { 
                ?>
                    <a href="/garageVparrot/login.php">Se connecter</a>
                    <a href="/garageVparrot/signup.php">S'inscrire</a>
                <?php
                }
                ?>
            </div>
        </nav>
        </div>
        </div>
    </header>