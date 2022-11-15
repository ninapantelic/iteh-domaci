<?php
$host = "localhost";
$db = "rezervacije";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db);


if ($conn->connect_errno){
    exit("Nesupesna konekcija:  " . $conn->connect_errno);
}

?>