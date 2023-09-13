<?php
include'connect.php';

if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $fathername = $_POST["fname"];
    $dob = $_POST["dob"];
    @$admiss = $_POST["admiss"];
    $email = $_POST["email"];
    $teacher = $_POST["teacher"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $file = $_FILES["file"]["name"];

    $exe = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $ext = explode(".", $file);
    $arr = array("png", "jpg", "jpeg");
    $name = rand(100000,900000);
    
    
    if(in_array($exe, $arr)) {
      $mypic = $name.".".$exe;
        $sql = "INSERT INTO `get_image`(name,fname, dob, admiss, email, teacher, mobile,password,file) VALUES ('$username','$fathername','$dob','$admiss','$email','$teacher','$mobile','$password','$mypic')";
        $q = mysqli_query($conn, $sql);
        if ($q) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "./getimage/".$mypic) or die();
        echo "<script>alert('Data Added Successfully')</script>";
    }else{
        echo '<div class="error">Error Occured</div>';
    }
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
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
          </div>
          <div class="mb-3">
            <label for="exampleInputfname" class="form-label">Father Name</label>
            <input type="text" name="fname" class="form-control" id="fname">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" id="dob">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Admisssion type</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="private" name="admiss" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Private
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="regular" name="admiss" id="flexCheckChecked" checked>
              <label class="form-check-label" for="flexCheckChecked">
                Regular
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="admin@gmail.com">
          </div>
          <select class="form-select" name="teacher" aria-label="Default select example">
            <option selected>Select Teachers</option>
            <option  value="Anees">Pro M.Anees</option>
            <option  value="Qamar">Pro M.Qamar</option>
            <option  value="Sulman">Pro M.Sulman</option>
          </select>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mobile No.</label>
            <input type="number" name="mobile" class="form-control" id="exampleInputmobile">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group mb-3">
            <label for="username">Profile Pic:</label>
            <input class="form-control" type="file" name="file">
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