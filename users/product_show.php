<?php

    if (isset($_POST["addcart"])) {
        $pname    = $_POST["pname"];
        $price    = $_POST["pprice"];
        $quantity = $_POST["pquantity"];

        if (isset($_SESSION["cart"])) {
            $check_product = array_column($_SESSION["cart"], 'name');
            if (in_array($pname, $check_product)) {

                echo "
                <script>
                    alert('Item already in the cart');
                    window.location.href = 'index.php';

                </script>
            ";
                die();
            }
        }
        $_SESSION["cart"][] = ["name" => $pname, "price" => $price, 'quantity' => $quantity];

        // print_r($_SESSION['cart']);
        echo "<script>
        alert('Added to the cart successfully');
        window.location.href = window.location.href;
        </script>";

    }

?>











<?php

    @include "../admin/product/dbconfig.php";

    if ($category != "Home") {
        $query = $conn->prepare("select * from `products` where category = ? ;");
        $query->bind_param("s", $category);
    } else {
        $query = $conn->prepare("select * from `products`;");
    }
    if ($query->execute()) {
        $result = $query->get_result();
    } else {
        echo "not run ";
    }

?>





<h1 class="text-success text-monospace fw-bold fs-4 text-center mb-3"><?php echo $category . 's'; ?></h1>


<div class="container">
  <div class="row g-4">

<?php foreach ($result as $row) {?>

    <div class="col-12 col-md-6 col-lg-4">
      <div class="card h-100 shadow">
        <form action="#" method="post">
        <img src="../admin/product/<?php echo $row['image'] ?>" style="height:200px; object-fit: contain;" class="card-img-top margin-auto" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name'] ?></h5>
          <input type="hidden" name ="pname" value="<?php echo $row['name'] ?>">
          <input type="hidden" name="pprice" value="<?php echo $row['price']; ?>">
          <p class="card-text"><?php echo "Rs." . number_format($row['price'],2); ?></p>
          <p class="card-text"><?php echo "Category: " . $row['category'] ?></p>
          <input class="form-control my-2" name='pquantity'type="number" value="1" min="1" max="20" placeholder="Quantity">

          <?php if (isset($_SESSION['user'])) {?>
            <button name="addcart" class="btn btn-success">Add to Cart</button>

          <?php } else {?>
              <a href="./form/login.php" class="btn btn-success">Login to Add to Cart</a>
            <?php }?>

        </div>
        </form>
      </div>
    </div>


<?php }?>






  </div>
</div>