<?php  
    session_start();




    if (isset($_POST["delete"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if($value['name']==$_POST['delete']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']= array_values($_SESSION['cart']);
                header('location:view-cart.php');
                die();
            }
        }
    }else if (isset($_POST["update"])) {
        $quantity = $_POST["updateQ"];
        $pname = $_POST["pname"];
         $price = $_POST["pprice"];
        foreach ($_SESSION["cart"] as $key => $value) {
            if($value['name']==$pname){
                $_SESSION["cart"][$key] = Array("name"=> $pname,"price"=> $price,'quantity'=> $quantity);
                header('location:view-cart.php');
                die();
            }
        }
    }
?>