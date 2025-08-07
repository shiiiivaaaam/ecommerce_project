<?php 
    session_start();

    @include("../../admin/product/dbconfig.php");

    if (isset($_POST["register"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query=$conn->prepare("insert into `users` (`name`,`email`,`password`) values (?,?,?)");
        $query->bind_param("sss",$name,$email,$password);
        if ($query->execute()) {
            echo "
                <script>
                    alert('User Registered Successfully , Login Here To Continue');
                    window.location.href = 'login.php';
                </script>
            
            ";  
        }else{
            echo "
                <script>
                    alert('User Already Registered,use different email or login.');
                    window.location.href = 'register.php';
                </script>
            
            ";  
        }
    }else if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query=$conn->prepare("select * from `users` where `email` =? and `password`=?");
        $query->bind_param("ss",$email,$password);
        if ($query->execute()) {
            $result = $query->get_result();
            
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            $_SESSION["user"] = ['name'=>$row['name'],'email'=>$email,'admin'=>$row['admin']];
            echo "
                <script>
                    alert('Logged In Successfully');
                    window.location.href = '../index.php';
                </script>
            
            "; 
        }else{
            echo "
                <script>
                    alert('Invalid Email Or Password');
                    window.location.href = 'login.php';
                </script>
            
            "; 
        }
    }else {
        echo "
                <script>
                    alert('Invalid Email Or Password');
                    window.location.href = 'login.php';
                </script>
            
            "; 
    }
}

?>