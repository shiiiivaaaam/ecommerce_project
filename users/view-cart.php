<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart Page</title>
     <!-- bootstrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php 
    session_start();
        @include("./header.php");
        if(isset($_SESSION["cart"])){
    ?>
    <div class="container">
        <h1 class="text-center">My Cart</h1>
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr.No.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    
    
    
        $g_total=0;

    foreach($_SESSION['cart'] as $key=>$value){ 
        $i=$key+1;
        $total = (float)$value['price'] * (int)$value['quantity'];
        $g_total += $total;
        ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $value['name'] ?></td>
      <td><?php echo $value['price'] ?></td>

      <form action="./insert-cart.php" method="post"> 
      <input type ='hidden' name ="pname" value="<?php echo $value['name']?>">
      <input type ='hidden' name ="pprice" value="<?php echo number_format($value['price'],2) ?>">
      <td><input class="form-control w-50 my-2" name='updateQ'type="number" value="<?php echo $value['quantity'] ?>" min="1" max="20" ></td>
      <td><?php echo $total ?></td>
      <td><button name="update"  class="btn btn-warning"> <i class="fa-solid fa-pen"></i></button></td>
      
      <td><button name="delete" value="<?php echo $value['name'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></td>
      </form>
    </tr>
<?php } ?>
    
  </tbody>
</table>
<div class="row">
<h6 class="border-success col-10">Grand Total : <?php echo $g_total; ?></h6>
<a href="./empty-cart.php" class="text-decoration-none col-2"><h6 class="border-success text-danger"><i class="fa-solid fa-trash"></i>Empty Cart</h6></a>
</div>

    </div>
    
<?php }else{
    
          echo "<p class='text-center fs-5 fw-bold '>Your Cart is empty</p>" ; 
    }
    ?>
<?php @include("./footer.php"); ?>
</body>
</html>