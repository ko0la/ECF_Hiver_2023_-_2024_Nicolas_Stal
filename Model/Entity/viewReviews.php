<?php
require_once(dirname(__FILE__) . "/../config/config.php");
//Sécurisation relative, a améliorer, die n'est pas USERFRIENDLY
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
;
if (session_status() == PHP_SESSION_NONE) {
    die('No active session found');
}

    try {
        $stmt = 'Select * from feedback where status = 1 ORDER by id DESC';
        $query = $pdo->prepare($stmt);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {      
            $id_sanitized = htmlspecialchars($row['id']);
            $name_sanitized = htmlspecialchars($row['name']);
            $note_sanitized = htmlspecialchars($row['note']);
            $content_sanitized = htmlspecialchars($row['content']);
            $pair=2;
            echo '<div class="row">';
            if ($pair % 2 == 0) {

                echo ' 
                <div class="col-12">
                <div class="card rounded bg-secondary mt-3 d-flex">
                <div class="card-head d-flex"><div class="col-3 d-flex">Note : '.$note_sanitized.'/5</div><div class="col-9 d-flex justify-content-end">Titre du commentaire : '.$name_sanitized.'</div></div> <hr>
                <div class="card-body">
                <div class="row">
                
                <div class="col-12 d-flex justify-content-center">'.$content_sanitized.'</div></div><hr>';
            } else {
            '
            
            <div class="col-12">
            <div class="card rounded bg-secondary mt-3 d-flex">
            <div class="card-head d-flex"><div class="col-3 d-flex">Note : '.$note_sanitized.'/5</div><div class="col-9 d-flex justify-content-end">Titre du commentaire : '.$name_sanitized.'</div></div> <hr>
            <div class="card-body">
            <div class="row">
            
            <div class="col-12 d-flex justify-content-center">'.$content_sanitized.'</div></div><hr>
            ';
            }    echo '</div>';    
            $pair=$pair+1;} 
        } catch (PDOException $e) {
        echo ''. $e->getMessage() .'';
}
