<?php
session_start();
require_once "db.php";
global $connect;

if (isset($_POST['username']) and isset ($_POST['mdp'])){
    $username=$_POST['username'];
    $password=$_POST['mdp'];

    if(!empty($username) and !empty($password)){
        $req=$connect->query("SELECT * from user where login= '$username' and password='$password'");
    if($req){
        echo 'OK';
    }else{
        echo 'failed';
    }
    
    }
    $data=$req->fetch();
    $_SESSION['nom']= $data['nom'];
    $_SESSION['prenom']= $data['prenom'];
    $_SESSION['avatar']= $data['avatar'];
}