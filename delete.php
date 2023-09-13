<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $q = "SELECT * FROM `get_image` WHERE id=$id";
    $run = mysqli_query($conn, $q);
    $exec = mysqli_fetch_assoc($run);
    unlink ("./getimage/". $exec['file']);
    $sql = "DELETE FROM `get_image` WHERE id=$id";
    $result = mysqli_query($conn,$sql,);
    if ($result) {
        // echo "Delete Data successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>
<?php
include 'connect.php';
?>
