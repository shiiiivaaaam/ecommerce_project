


<?php            
        @include_once("dbconfig.php");

        $id = $_POST["update"];

        $query = $conn->prepare("select * from `products` where id =?");
        $query->bind_param("i", $id);
        if ($query->execute() ) {
            $result = $query->get_result();
            $row = $result->fetch_assoc();
           
            $name = $row["name"];
            $price = $row["price"];
            $image = $row["image"];
            $category = $row["category"];

        }else {
            echo "database couldnt fetch error.";
        }

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
                <form method="post" action="adminrequest.php" enctype="multipart/form-data">
  <div class="mb-3">
    <h2 class="text-center text-success">Update Product Details:</h2>
    <label for="Pname" class="form-label">Edit Product Name:</label>
    <input type="text" value="<?php echo $name ?> "class="form-control" id="Pname" name="Pname" required>

  </div>
  <div class="mb-3">
    <label for="Pprice"  class="form-label">Edit Product Price:</label>
    <input type="text" value="<?php echo $price ?> " class="form-control" id="Pprice" name="Pprice" required>
  </div>
  <div class="mb-3">
    <label for="Pimage" class="form-label">Update Product Image:</label>
    <input type="file" id="Pimage" name="Pimage" class="form-control" value="<?php echo $image ?>" required>
    <img src="<?php echo $image ?>" style="width:150px;" alt="">
  </div>
  <div class="mb-3">
    <label for="Pcategory" class="form-label">Update Product Category</label>
    <select class="form-select" aria-label="Default select example" name="Pcategory">
  <option value="<?php echo $category ?>" selected><?php echo $category ?></option>
  <option value="Home">Home</option>
  <option value="Laptop">Laptop</option>
  <option value="Bag">Bag</option>
  <option value="Mobile">Mobile</option>
</select>
  </div>
  <input type="hidden" value="<?php echo $id ?>" name = 'id'>
  <button name="update" class="form-control bg-success  text-white mb-3">Update</button>
</form>
<a href="./index.php" class="href col-9"><p>Go Back</p></a>
            </div>
        </div>
    </div>





</body>
</html>
