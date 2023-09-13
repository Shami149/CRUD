<?php
include 'connect.php';
$tid = $_GET['deleteid'];
    $q = "SELECT * FROM `teach` WHERE `tid` = $tid";
    $run = mysqli_query($conn, $q);
    $exec = mysqli_fetch_assoc($run);
    $phile = unserialize($exec['files']);
     foreach ($phile as $value) {
    unlink ("./getimage/teacher/". $value);
    $msg = "right";

     }
     if ($msg == "right") {
        $sql = "DELETE FROM `teach` WHERE `tid` = $tid";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            header('location:teacherdisplay.php');
        }else{
            die(mysqli_error($conn));
        }
     }
    
?>