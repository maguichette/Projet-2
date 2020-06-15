<?php
require_once "db.php";
global $connect;
$login=$_POST['login'];
$req=$connect->query("DELETE FROM user WHERE login='$login'");
if ($req->rowCount()>0){
    echo 'ok';
}
