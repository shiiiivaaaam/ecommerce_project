<?php 

if(isset($_POST["Pupload"])){
    @include("dbconfig.php");
    $pname =$_POST["Pname"];
    $pprice =$_POST["Pprice"];
    $pimage =$_FILES["Pimage"];
    $pcategory =$_POST["Pcategory"];
    $image_loc = $_FILES["Pimage"]["tmp_name"];
    $image_name = $_FILES["Pimage"]["name"];
    $image_des = "uploadimages/".$image_name;
    move_uploaded_file($image_loc, $image_des);


    $query = $conn->prepare("insert into `products`(`name`,`price`,`image`,`category`) values(?,?,?,?);");
    $query->bind_param("ssss", $pname,$pprice,$image_des,$pcategory);

    $result = $query->execute();
    if($result){
        header("Location: index.php");
    }else {
        echo "couldnt add the product";
    }



}


?>