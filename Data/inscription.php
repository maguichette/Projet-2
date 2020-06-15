<?php
require_once "db.php";
require_once "../Pages/function.php";
avatar();
global $connect;

if (isset($_POST['prenom']) and isset ($_POST['nom']) and isset ($_POST['login'])and isset ($_POST['password'])and isset ($_FILES['file'])){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $file=$_FILES['file']['name'];
    if($_POST['role']=="admin"){
        $role='admin';
    }else{
        $role='joueur';
    }

    if(!empty($prenom) and !empty($nom)and !empty($login)and !empty($password)and !empty($file)){

        $reponse=$connect->prepare("INSERT INTO user(login,password,prenom,nom,role,avatar)
        VALUES(:login,:password,:prenom,:nom,:role,:avatar)");
        $reponse->execute(array(
            'login'=>$login,
            'password'=>$password,
            'prenom'=>$prenom,
            'nom'=>$nom,
            'role'=>$role,
            'avatar'=>$file
        ));
        if($reponse->rowCount()>0){
            echo "reussi";
        }else{
            echo 'erreur';
        }
    }
}
   