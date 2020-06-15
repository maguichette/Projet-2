<?php
function avatar(){
    if(isset($_FILES['file'])){
        $name= $_FILES['file']['name'];
        $tmp_name= $_FILES['file']['tmp_name'];
        $local="../IMG/";
    }
    return move_uploaded_file($tmp_name, $local.$name);
}