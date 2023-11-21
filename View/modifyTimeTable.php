<?php
require_once __DIR__ . "/../Model/cookie_creator.php";
if (isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] == 1) { ?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/garageVparrot/View/common/stylesheets/header.css">
    <Title>Page d'accueil du garage</Title>
</head>

<body>
<div class="container-fluid">
<?php require_once __DIR__."/common/header.php"; ?>
<div class="row">
    <?php 
    require_once __DIR__."/common/sidebar.php"?>
        <div class="col-md-10  col-sm-12">
            <h3>Voici les horaires actuels</h3>
<?php
require_once __DIR__."/../Model/Entity/actualTimeTable.php" 
?> 
<hr>     
<?php for ($i=1; $i<=7; $i++) {?> 
<div class="<?php echo dayAssociation($i); ?>">Modifier les horaires du <?php echo dayAssociation($i); ?></div><br>
<form id="form<?php echo $i;?>" method="POST" action="/garageVparrot/model/Entity/update_timetable.php" onsubmit="return validateTimes(<?php echo $i; ?>);">
    <input type="hidden" name="day_id" value="<?php echo $i; ?>">
<label for="open<?php echo ($i);?>">
        <input type="checkbox" id="open<?php echo ($i);?>" name="open<?php echo ($i);?>" value="open" onclick="manageTimeFields(<?php echo $i; ?>)">
        Ouvert ce jour
    </label>
    <label for="secondperiod<?php echo ($i);?>" id="secondperiodLabel<?php echo ($i);?>" style="display: none;">
        <input type="checkbox" id="secondperiod<?php echo ($i);?>" name="secondperiod<?php echo ($i);?>" value="break" onclick="manageBreakTimeFields(<?php echo $i; ?>)">
        Ferme le midi
    </label>
    <br>
    <div id="timeFields<?php echo $i; ?>" style="display: none;">
        <label for="opening_time<?php echo ($i);?>">Ouvre à</label>
        <input type="time" id="opening_time<?php echo ($i);?>" name="opening_time<?php echo $i; ?>">

        <label for="closing_time<?php echo ($i);?>">Ferme à</label>
        <input type="time" id="closing_time<?php echo ($i);?>" name="closing_time<?php echo $i; ?>">
    </div>
    <div id="breakTimeFields<?php echo $i; ?>" style="display: none;">
        <label for="afternoon_opening_time<?php echo ($i);?>">Réouvre à</label>
        <input type="time" id="afternoon_opening_time<?php echo ($i);?>" name="afternoon_opening_time<?php echo $i; ?>">

        <label for="afternoon_closing_time<?php echo ($i);?>">Ferme le soir à</label>
        <input type="time" id="afternoon_closing_time<?php echo ($i);?>" name="afternoon_closing_time<?php echo $i; ?>">
    </div>
    <input class="btn-primary" type="submit" value="Modifier les horaires du <?php echo dayAssociation($i); ?>">
</form>
<hr>
<?php } ?>

<script src="/garageVparrot/Controller/scripts/modifierhoraires.js"></script>
<?php require_once __DIR__."/common/footer.php"; ?>
</body>
</html>
    <?php } else {
        header("Location: /garageVparrot/logout.php");
        exit();
    }
} else {
    header("Location: /garageVparrot/logout.php");
    exit();
}?>
