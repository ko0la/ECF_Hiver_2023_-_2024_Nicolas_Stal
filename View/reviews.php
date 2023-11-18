<?php require_once __DIR__ . "/../Model/cookie_creator.php"; ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les avis de nos clients</title>
    <link rel="stylesheet" type="text/css" href="/garageVParrot/View/common/stylesheets/signup.css" />
</head>

<body>
    <div class="container-fluid">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
            
            <?php require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">
            <div>Vous souhaitez laissez laissez un avis client ? C'est ici => <a href="/garageVparrot/create_review.php">Formulaire d'avis</a></div>
            <hr>
                <div class='usersComment'>
                    <?php if (isset($_SESSION["user_role"])) {
                        if ($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 1) require_once __DIR__ . "/../Model/Entity/reviewFeedback.php";
                        if ($_SESSION['user_role'] == 3) {
                            require_once __DIR__ . '/../Model/Entity/viewReviews.php';
                        }
                    } else {
                        require_once __DIR__ . '/../Model/Entity/viewReviews.php';
                    } ?>
                </div>
            </div>
        </div>
        </script>
</body>

</html>