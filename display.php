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
  <table  class="table mt-4 " border="1px black solid">
    <thead>
    <tr>        
        <th scop="col">ID</th>
        <th scop="col">Username</th>
        <th scop="col">Father Name</th>
        <th scop="col">Date of Birth</th>
        <th scop="col">Admisssion Type</th>
        <th scop="col">Email</th>
        <th scop="col">Teacher</th>
        <th scop="col">Mobile</th>
        <th scop="col">Password</th>
        <th scop="col">Profile Picture</th>
    </tr>
    </thead>
    <tbody>
        <?php
                $dq = "SELECT * FROM `get_image` ";
                $queryd = mysqli_query($conn, $dq);
                while ( $result = mysqli_fetch_array($queryd) ) {
                    ?>
                    <tr>
                    <td> <?php echo $result['id'];  ?> </td>
                    <td> <?php echo $result['name'];  ?> </td>
                    <td> <?php echo $result['fname'];  ?> </td>
                    <td> <?php echo $result['dob'];  ?> </td>
                    <td> <?php echo $result['admiss'];  ?> </td>
                    <td> <?php echo $result['email'];  ?> </td>
                    <td> <?php echo $result['teacher'];  ?> </td>
                    <td> <?php echo $result['mobile'];  ?> </td>
                     <td> <?php echo $result['password'];  ?> </td>
                     <td> <img src="<?php echo "./getimage/". $result['file']; ?>" height="150px" width="150px" </td>
                     <td>
                    <button class="btn btn-danger"><a href="update.php?updateid=<?php echo $result['id'];  ?>  " class="text-light">Update</a></button> <br> <br>
                    <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $result['id'];  ?>  " class="text-light">Delete</a></button>
                    </td>        
                    </tr>
                   

                    <?php
                }
        //     }
        // }
    ?>
    </tbody>
    </table>  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
</html>