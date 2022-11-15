<?php

require "../dbBroker.php";
require "../model/gost.php";

if(isset($_POST['name']) && isset($_POST['surname']) 
&& isset($_POST['email']) && isset($_POST['phone'])){

    
    $gost = new Gost(null,$_POST['name'],$_POST['surname'],$_POST['email'],$_POST['phone'] );
    //moze null za id jer radi svakako autoincrement
    $status = Gost::add($gost, $conn);

    if($status){
        echo 'Uspesno dodat gost!';
    }else{
        echo $status;
        echo "Nesupesno dodat gost!";
    }
}


?>