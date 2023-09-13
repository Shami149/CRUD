<?php
include 'connect.php';
?>
<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>crud-read</title>
</head>

<body>
<?php include'nav.php';?>
    <table class="table mt-4 " border="1px black solid">
        <thead>
            <tr>
                <th scop="col">ID</th>
                <th scop="col">Username</th>
                <th scop="col">Email</th>
                <th scop="col">Student</th>
                <th scop="col">Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dq = "SELECT * FROM `teach` t INNER JOIN `get_image` s  ON t.sname = s.id ";
            $queryd = mysqli_query($conn, $dq);
            while ($result = mysqli_fetch_array($queryd)) {
            ?>
                <tr>
                    <td> <?php echo $result['tid'];  ?> </td>
                    <td> <?php echo $result['tname'];  ?> </td>
                    <td> <?php echo $result['email'];  ?> </td>
                    <td> <?php echo $result['name'];  ?> </td>
                    <td>
                        <?php
                        $phile = unserialize($result['files']);
                        foreach ($phile as $value) {
                        ?>
                            <img src="<?php echo "./getimage/teacher/".$value; ?>" height="150px" width="150px">
                        <?php
                        }
                        ?>
                    </td>

                
                <td>
                    <button class="btn btn-danger"><a href="updateteacher.php?updateid=<?php echo $result['tid'];  ?>  " class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="deleteteacher.php?deleteid=<?php echo $result['tid'];  ?>  " class="text-light">Delete</a></button>
                </td>
                </tr>
                <?php } ?>

        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

</html>