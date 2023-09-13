<?php
include'connect.php';

if (isset($_POST["submit"])) {
    $username = $_POST["tname"];
    $email = $_POST["email"];
    $student = $_POST["sname"];
    $file = $_FILES["files"]["name"];
    $fazpic = array();
    foreach ($file as $img) {
      $exe = strtolower(pathinfo($img, PATHINFO_EXTENSION));
      $arr = array("png", "jpg", "jpeg");
      $name = rand(100000,900000);
      $mypic = $name.".".$exe;
      if (in_array($exe, $arr)) {
        $fazpic[] = $mypic;
        $msg= "right";
      }else{
        $msg = "not rightn";
        break;
      }
    }
    $fil = serialize($fazpic);
    if ($msg = "right") {
      $sql = "INSERT INTO `teach`(tname, email, sname,files) VALUES ('$username','$email','$student','$fil')";
      $run = mysqli_query($conn, $sql);
      if ($run) {
        foreach ($fazpic as $key => $data) {
          move_uploaded_file($_FILES["files"]["tmp_name"][$key], "./getimage/teacher/".$data);
        }
        $msg = "Data has been inserted";
      }else{
        $msg = "Data has been not inserted";
      }
    }else{
      $msg = "PLZ SELCET YOUR FILE SIZ";
    }


}     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
<?php include'nav.php';?>
  <div class="conatiner"> <br>
    <h2 align="center">
      Insert your data here
    </h2>
    <div class="row justify-content-center ">
      <div class="col-lg-8">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputName" class="form-label">Teacher Name</label>
            <input type="text" name="tname" class="form-control" id="name" aria-describedby="name">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="admin@gmail.com">
          </div>
          <div class="mb-3">
          <select class="form-select" name="sname" aria-label="Default select example">
            <option selected>Select Students</option>
            <?php
            $dq = "SELECT * FROM `get_image` ";
            $queryd = mysqli_query($conn, $dq);
            while ( $result = mysqli_fetch_array($queryd) ) {
            ?>
            <option value="<?php echo $result['id'];  ?>"><?php echo $result['name'];  ?></option>
            <?php
            }
            ?>
          </select>
          </div>
          <div class="form-group mb-3">
            <label for="username">Profile Pic:</label>
            <input class="form-control" type="file" name="files[]" multiple>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>

</html>