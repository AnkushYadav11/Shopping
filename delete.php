<?php
include './db.php';

$did = isset($_GET['deleteid'])? $_GET['deleteid']:null;
if(isset($_GET['deleteid'])){
    $dst = $conn->prepare('delete from feedback where id=?');
    $dst->bind_param('i',$did);
    if($dst->execute()){
        
        header('location:./contact.php#feedback');
    }
}
?>