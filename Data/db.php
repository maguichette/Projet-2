<?php
    $serveur="mysql-madise.alwaysdata.net";
    $database="madise_quizzdb";
    $login="madise";
    $password="ndeyemaguette";
   
    try {
      $connect = new PDO("mysql:host=$serveur;dbname=$database;charset=utf8mb4", $login, $password);
      $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
    