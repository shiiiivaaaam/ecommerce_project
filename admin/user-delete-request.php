<?php 
    @include_once("./product/dbconfig.php");
if (isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $query = $conn->prepare("delete from `users` where id =?");
    $query->bind_param("i", $id);
    if ($query->execute() ) {
        echo"
            <script>
                alert('User Deleted Successfully');
                window.location.href ='user-table.php';
            </script>
        
        
        ";

    }else {
        echo "couldnt delete the user ";
    }
}




?>