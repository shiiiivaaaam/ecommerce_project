<?php 

session_start();
session_unset();
echo "

    <script>
        alert('Logged Out Successfully');
        window.location.href = '../index.php';
    
    </script>
    

";

die();


?>