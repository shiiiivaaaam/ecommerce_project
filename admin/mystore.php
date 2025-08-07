<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home-page</title>
    <!-- bootstrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php session_start();
    if (isset($_SESSION["user"]) && $_SESSION["user"]["admin"]   == 1) { ?>
  
  
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white"><h1><i class="fa-brands fa-shopify"></i> Admin </h1></a>
    <span>
        <i class="fa-solid fa-user-tie"></i>
        Hello,<?php echo $_SESSION["user"]['name'];?>   |
        <i class="fa-solid fa-right-to-bracket"></i>
        <a href="../users/form/logout.php" class="text-decoration-none text-white"> Logout  |</a>
        <a href="../users/index.php" class="text-decoration-none text-white"> UserPanel</a>
    </span>   
  </div>
</nav>

<div class="container">
    <h2>Dasboard</h2>
</div>

<div class="col-6 container text-center bg-success">
    <a href="./product/index.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Add Post</a>
    <a href="./user-table.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Users</a>
</div>

<?php @include("../users/footer.php"); ?>
<?php }else {

  echo 'Unauthorized Access';

}?>
<


</body>
</html>