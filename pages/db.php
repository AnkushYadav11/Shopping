<?php
session_start();
$conn = new mysqli('localhost','root','root','shopping');
if(!$conn){
    die(mysqli_error($conn));
}
?>