<?php 

  session_start();
  if (isset($_SESSION["user"]) && $_SESSION["user"]["admin"] == 1) {
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- bootstrap css cdn -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto border border-primary mt-4">
                <form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="mb-3">
    <h2 class="text-center text-success">Product Details:</h2>
    <label for="Pname" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="Pname" name="Pname" required>

  </div>
  <div class="mb-3">
    <label for="Pprice" class="form-label">Product Price:</label>
    <input type="text" class="form-control" id="Pprice" name="Pprice" required>
  </div>
  <div class="mb-3">
    <label for="Pimage" class="form-label">Product Image</label>
    <input type="file" id="Pimage" name="Pimage" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="Pcategory" class="form-label">Product Category</label>
    <select class="form-select" aria-label="Default select example" name="Pcategory">
  <option value="Home" selected>Home</option>
  <option value="Laptop">Laptop</option>
  <option value="Bag">Bag</option>
  <option value="Mobile">Mobile</option>
</select>
  </div>
  <button name="Pupload" class="form-control bg-success text-white mb-3">Upload</button>
</form>
<a href="../mystore.php" class="href col-9"><p>Go To Admin Dashboard</p></a>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-10 m-auto my-5">


<table class="table">
  <thead>
    <tr>
      <th scope="col-2">#id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
<?php
    @include("./dbconfig.php");
    $query = $conn->prepare("select * from products;");
    if ($query->execute()) {
        $result = $query->get_result();
        foreach ($result as $row) {
            $id = $row["id"];
            $name = $row["name"];
            $price = $row["price"];
            $image = $row["image"];
            $category = $row["category"];
        
    
    echo "<tr>";
    echo " <th scope='row'>$id</th>".
      "<td>$name</td>".
      "<td>$price</td>".
      "<td><img src ='$image ' width='100px'></td>".
      "<td>$category</td>"?>
      <form action="./updateproduct.php" method ="post">
      <td><button name='update' value="<?php echo $id ?>" class='btn btn-warning'> <i class='fa-solid fa-pen'></i></button></td>
          </form>
      <form action="./adminrequest.php" method ="post">
      <td><button name='delete' value='<?php echo $id ?>' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></td>
      </form>
    <?php echo
      "</tr> ";
        }
    }else {
        echo "couldnt fetch products";
    } 
?>
  </tbody>
</table>
        </div>
    </div>
</div>

<?php @include("../../users/footer.php"); ?>

</body>
</html>

<?php }else {

  echo "Access Denied";

}?>
