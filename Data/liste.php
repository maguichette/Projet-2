<?php 
      require_once "db.php";
      global $connect;

        $limit = $_POST["limit"]; // 
    $offset = $_POST["offset"]; //

    $sql ="
            SELECT (`prenom`), (`nom`), (`score`),(`login`) FROM user 
            WHERE `role`='joueur'
            ORDER BY `user`.`score` DESC
            LIMIT {$limit}
            OFFSET {$offset}
    ";
        
    $req = $connect->query($sql);
    $result = $req->fetchAll(2);

    echo json_encode($result);

    