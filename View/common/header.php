<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

    <header class="no-gutters bg-dark">
        <div class="row d-flex p-0">
        <div class="col-3 bg-dark justify-content-center d-flex pr-0 pl-0 no-gutters">
        <img class="logo-img pr-0 pl-" src="/garageVparrot/public/images/LogoSmall.webp" alt="Logo"></div>
        <div class="col-9 pr-0 pl-0">
        <nav class="navbar navbar-light bg-dark justify-content-center">
            <div class="nav-links ">
                <a href="/garageVparrot/index.php">Page d'accueil</a>
                <?php 
                if(isset($_SESSION['username'])) { // check if user is logged in
                ?>
                    <a href="/garageVparrot/profile.php">Modération</a>
                    <a href="/garageVparrot/logout.php">Se déconnecter</a>
                <?php 
                } else { 
                ?>
                    <a href="/garageVparrot/login.php">Se connecter</a>
                    <a href="/garageVparrot/contact.php">Nous contacter</a>
                <?php
                }
                ?>
            </div>
        </nav>
        </div>
        </div>
    </header>