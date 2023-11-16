<?php require_once __DIR__."/../Model/cookie_creator.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="container-fluid">
            <?php require_once __DIR__ . "/common/header.php"; ?>
            <div class="row">
                <?php require_once __DIR__ . "/common/sidebar.php" ?>
                <div class="col-md-10  col-sm-12">
                    <div class='usersComment'>
                        <?php require_once __DIR__ ."/../Model/Entity/reviewFeedback.php"; ?>
                </div>
                </div> 
                </div>
    <script src="/garageVparrot/Controller/scripts/reviewGetter.js"></script>
                </body>
            </html>
