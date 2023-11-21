<?php require_once __DIR__ . "/../model/cookie_creator.php"; 
if (isset($_SESSION["user_role"])) { ?>
    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
        <Title>Ajouter un véhicule à vendre</Title>
    </head>

    <body>
        <div class="container-fluid">
            <?php require_once __DIR__ . "/common/header.php"; ?>
            <div class="row">
                <?php
                require_once __DIR__ . "/common/sidebar.php" ?>
                <div class="col-md-10  col-sm-12">
                    <h3>Vous souhaitez mettre en ligne un véhicule ?</h3>
                    <form class="vertical-form" method="post" action="/garageVparrot/Model/Entity/add_car.php" enctype="multipart/form-data" id="carform">
                        <label for="carName">Nom du véhicule :</label>
                        <span id="feedbackcarName"></span>
                        <input type="text" id="carName" name="carName">
                        <label for="brand">Marque :</label>
                        <span id="feedbackbrand"></span>
                        <input type="text" id="brand" name="brand">
                        <label for="price">Prix de vente:</label>
                        <span id="feedbackprice"></span>
                        <input type="text" id="price" name="price">
                        <label for="mileage">Kilométrage :</label>
                        <span id="feedbackmileage"></span>
                        <input type="text" id="mileage" name="mileage">
                        <label for="firstCirculation">Mise en circulation :</label>
                        <span id="feedbackfirstCirculation"></span>
                        <input type="text" id="firstCirculation" name="firstCirculation">
                        <label for="photoNames">Images que vous souhaitez associer au véhicule</label>
                        <span id="feedbackphotoNames"></span>
                        <input type="file" name="photoNames[]" id="photoNames" multiple accept=".jpg, .png, .jpeg, .gif, .webp,.bmp, .tif, .tiff|image/*">
                        <label for="options">Options :</label>
                        <span id="feedbackoptions"></span>
                        <textarea class="col-12" name="options" id="options" placeholder="Mettez ici les détails de la voiture"></textarea>
                        <input type="submit" class="btn-primary" value="Mettre en ligne le véhicule">
                    </form>
                    <?php require_once __DIR__ . "/../Model/Entity/get_car_list.php";?>
                </div>
            </div>
        </div>
        </div>
        <?php require_once __DIR__ . "/common/footer.php"; ?>
        <script src="/garageVparrot/Controller/scripts/addCar.js"></script>
    </body>

    </html>
 

<?php } else {
            header('Location: /garageVparrot/logout.php');
            exit();
        }
