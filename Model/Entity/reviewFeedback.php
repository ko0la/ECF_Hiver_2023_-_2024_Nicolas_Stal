<?php
//Sécurisation relative, a améliorer, die n'est pas USERFRIENDLY
if (session_status() == PHP_SESSION_NONE) {
    session_start();
};
if (session_status() == PHP_SESSION_NONE) {
    die('No active session found');
}
if (!isset($_COOKIE[session_name()])) {
    die('Session cookie is not set');
}

if (session_id() != $_COOKIE[session_name()]) {
}
require_once(dirname(__FILE__) ."/../config/config.php");
if($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 1) {
    try {
        $stmt = 'Select * from feedback where status = 2 ORDER by id DESC';
        $query= $pdo->prepare($stmt);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $pair=2;
        foreach ($result as $row) {
        
            $usernameFetch='select username from users where id = :userid';
            $prepareFetch=$pdo->prepare($usernameFetch);
            $prepareFetch->bindValue(':userid', $row['userID']);
            $prepareFetch->execute();

            if ($prepareFetch->rowCount() > 0) {
                $username = $prepareFetch->fetch(PDO::FETCH_ASSOC);
            } else {
                $username['username']= "Pepo";
            }
            
            $username_sanitized = htmlspecialchars($username['username']);
            $id_sanitized = htmlspecialchars($row['id']);
            $name_sanitized = htmlspecialchars($row['name']);
            $note_sanitized = htmlspecialchars($row['note']);
            $content_sanitized = htmlspecialchars($row['content']);
            echo '<div class="row">';
            if ($pair%2==0)
            {

            echo  '
            <div class="col-12">
            <div class="card rounded bg-secondary mt-3 d-flex">
            <div class="card-head d-flex"><div class="col-3">Nom d\'utilisateur : '.$username_sanitized.'</div><div class="col-9 d-flex justify-content-end">Titre du commentaire : '.$name_sanitized.'</div></div>
            <div class="card-body">
            <div class="row">
            <div class="col-3 d-flex">Note : '.$note_sanitized.'/5</div>
            <div class="col-9 justify-content-center">'.$content_sanitized.'</div>
            <div class="col-6 justify-content-center d-flex align-items-end">
            <form action="/garageVparrot/Model/Entity/delete_comment.php" method="POST">
            <input type="hidden" name="comment_id" value="'.$id_sanitized.'" />
            <input type="submit" class="btn btn-warning text-center"
            value="Supprimer le commentaire">
            </div>
            <div class="col-6 justify-content-center d-flex align-items-end">
            <form action="/garageVparrot/Model/Entity/validate_comment.php" method="POST">
            <input type="hidden" name="comment_id" value="'.$id_sanitized.'" />
            <input type="submit" class="btn btn-success text-center"
            value="Valider ce commentaire"></div>
            </div></div>
            </div>
            </div>
                    ';
            }
            else
    {   
        echo  '
        <div class="col-12">
        <div class="card rounded bg-primary mt-3 d-flex">
        <div class="card-head d-flex"><div class="col-3">Nom d\'utilisateur : '.$username_sanitized.'</div><div class="col-9 d-flex justify-content-end">Titre du commentaire : '.$name_sanitized.'</div></div>
        <div class="card-body">
        <div class="row">
        <div class="col-3 d-flex">Note : '.$note_sanitized.'/5</div>
        <div class="col-9 justify-content-center">'.$content_sanitized.'</div>
        <div class="col-6 justify-content-center d-flex align-items-end">
        <form action="/garageVparrot/Model/Entity/delete_comment.php" method="POST">
        <input type="hidden" name="comment_id" value="'.$id_sanitized.'" />
        <input type="submit" class="btn btn-warning text-center"
        value="Supprimer le commentaire">
        </div>
        <div class="col-6 justify-content-center d-flex align-items-end">
        <form action="/garageVparrot/Model/Entity/validate_comment.php" method="POST">
        <input type="hidden" name="comment_id" value="'.$id_sanitized.'" />
        <input type="submit" class="btn btn-success text-center"
        value="Valider ce commentaire"></div>
        </div></div>
        </div>
        </div>
                ';
            }
         echo '</div>';    
        $pair=$pair+1;
        
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        echo "There was a problem processing your request.";
    }
} else {
    try {
        $stmt = 'Select * from feedback where status = 1 ORDER by id DESC';
        $query= $pdo->prepare($stmt);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            print_r($row) . PHP_EOL;
            $usernameFetch='select username from users where id = :userid';
            $prepareFetch=$pdo->prepare($usernameFetch);
            $prepareFetch->bindValue(':userid', $row['userID']);
            $prepareFetch->execute();

            if ($prepareFetch->rowCount() > 0) {
                $username = $prepareFetch->fetch(PDO::FETCH_ASSOC);
            } else {
                $username['username']= "Pepo";
            }
            echo "<h1> Commentaires déja vérifiés </h1>";
            echo "<div class='feedback-container'>";
            echo "<div class='username'>" . htmlspecialchars($username['username']) . "</div>";
            echo "<div class='name'>" . htmlspecialchars($row['name']) . "</div>";
            echo "<div class='note'>" . htmlspecialchars($row['note']) . "/5</div>";
            echo "<div class='content'>" . htmlspecialchars($row['content']) . "</div>";
            echo "</div>";
        }
    }
    
     catch(PDOException $e) {
    error_log("Database Query Error: " . $e->getMessage(), 0);} 
echo "une Erreur est survenue";
}