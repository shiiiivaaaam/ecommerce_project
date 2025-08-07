<?php   

session_start();
if (isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1) {

@include_once("./product/dbconfig.php");
$query = $conn->prepare("select * from `users`");
if ($query->execute()){
    $result = $query ->get_result();

}else {
    echo "Couldnt fetch users from database ";
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <!-- bootstrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>


<div class="container">
        <h1 class="text-center">Users List</h1>
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Admin</th>
     
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    
    
    
        $g_total=0;

    foreach($result as $row){ 
        
        ?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['admin'] ?></td>

      <form action="./user-delete-request.php" method="post">
      
      <td><button name="delete" value="<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>

    </form>
    </tr>
<?php } ?>
    
  </tbody>
</table>
<div class="row">
<a href="./mystore.php" class="href">Go To Admin Dashboard</a>

    <?php @include("../users/footer.php"); ?>
</body>
</html>

<?php }else {
  echo 'Access Denied';
}
  
  
  ?>