<?php   
session_start();
unset($_SESSION["cart"]);
echo "
    <script>
        alert('cart emptied!');
        window.location.href = 'view-cart.php';
    </script>


";
die();

?>