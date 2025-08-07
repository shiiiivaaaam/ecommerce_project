<?php

    @include_once "dbconfig.php";

    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];

        $query = $conn->prepare("delete from `products` where id =?;");
        $query->bind_param("i", $id);
        if ($query->execute()) {
            echo "

                <script>
                    alert('Product Removed Successfully');
                    window.location.href = 'index.php';

                </script>


            ";
        } else {
            echo "couldnt delete";

        }
    } else if (isset($_POST["update"])) {
        $id = $_POST["id"];
        $pname      = $_POST["Pname"];
        $pprice     = $_POST["Pprice"];
        $pimage     = $_FILES["Pimage"];
        $pcategory  = $_POST["Pcategory"];
        $image_loc  = $_FILES["Pimage"]["tmp_name"];
        $image_name = $_FILES["Pimage"]["name"];
        $image_des  = "uploadimages/" . $image_name;
        move_uploaded_file($image_loc, $image_des);

        $query = $conn->prepare("update `products` set `name`=?,`price`=?,`image`=?,`category`=? where `id`=?;");
        $query->bind_param("ssssi", $pname, $pprice, $image_des, $pcategory,$id);

        $result = $query->execute();
        if ($result) {
            echo "
                <script>
                    alert('Produt Details Updated Successfully');
                    window.location.href = 'index.php';
                </script>

            
            ";
        } else {
            echo "couldnt update the product";
        }

    }

?>



