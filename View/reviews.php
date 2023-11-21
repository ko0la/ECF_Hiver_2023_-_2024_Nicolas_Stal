<?php require_once __DIR__ . "/../Model/cookie_creator.php"; ?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les avis de nos clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
</head>

<body>
    <div class="container-fluid content-container">
        <?php require_once __DIR__ . "/common/header.php"; ?>
        <div class="row">
        <div class="container-fluid"></div>
            <?php require_once __DIR__ . "/common/sidebar.php" ?>
            <div class="col-md-10  col-sm-12">

            <h3>Les commentaires de nos clients</h3>
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
        </div>            </div>
        </div>  
        </div>            </div>
        </div>  
        </div>
        <?php require_once __DIR__.'/common/footer.php'; ?>
</body>

</html>