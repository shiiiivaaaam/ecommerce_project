<?php 
session_start();
$count =0;
  if (isset($_SESSION["cart"])) {
      $count = count ($_SESSION["cart"]);
  }

?>
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid text-white">
    <a href="./index.php" class="navbar-brand text-white"><h1><i class="fa-brands fa-shopify"></i>Home</h1></a>
    <?php if (isset($_SESSION['user'])){?>
    <span>
        <i class="fa-solid fa-user-tie"></i> 
        Hello,<?php echo $_SESSION['user']['name']?> |
        <i class="fa-solid fa-cart-shopping"></i>
        <a href="./view-cart.php" class="text-decoration-none text-white"> My Cart(<?php echo $count ; ?>) |   </a>
        
        <i class="fa-solid fa-right-to-bracket"></i>
        <a href="./form/logout.php" class="text-decoration-none text-white"> Logout   |</a>
        
        <?php if ($_SESSION['user']['admin']==1){?>
          <i class="fa-solid fa-user-plus"></i>
      <a href="/ecommerce/admin/mystore.php" class="text-decoration-none text-white"> AdminPanel </a>

          <?php }?>
    </span>  
    <?php }else {?> 
        <span>
        
        <i class="fa-solid fa-cart-shopping"></i>
        <a href="./form/login.php" class="text-decoration-none text-white"> My Cart(0)   |</a>

        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <a href="./form/login.php" class="text-decoration-none text-white"> Login   |</a>
        
        <i class="fa-solid fa-user-plus"></i>
        <a href="./form/register.php" class="text-decoration-none text-white"> Register   </a>
        
    </span>

<?php }?> 





  </div>
</nav>



  <ul class="list-unstyled d-flex flex-column flex-md-row justify-content-center bg-success font-monospace p-3">
    <li><a href="./index.php?value=laptop" class="text-decoration-none fw-bold fs-5 mx-md-5 my-2 text-white">Laptops</a></li>
    <li><a href="./index.php?value=mobile" class="text-decoration-none fw-bold fs-5 mx-md-5 my-2 text-white">Mobiles</a></li>
    <li><a href="./index.php?value=bag" class="text-decoration-none fw-bold fs-5 mx-md-5 my-2 text-white">Bags</a></li>
  </ul>

