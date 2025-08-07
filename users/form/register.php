<?php 

session_start();
if (!isset($_SESSION["user"])) {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- bootstrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto border border-primary mt-4">
                <form method="post" action="./request.php" >
  <div class="mb-3">
    <h2 class="text-center text-success">User Register:</h2>
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>

  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="passwrod" class="form-label">Password:</label>
    <input type="password" id="password" name="password" class="form-control" required>
  </div>
  
  <button name="register" class="form-control bg-success text-white mb-3">Register</button>
  <div class="row">
  <a href="./login.php" class="href col-9"><p>Login For Already registered</p></a>
  <a href="../index.php" class="href col-3"><p>Go To Home</p></a>
  </div>
</form>
            </div>
        </div>
    </div>



<?php @include("../footer.php"); ?>
</body>
</html>
<?php }else {

      echo "Cannot Register while Logged In";
}?>