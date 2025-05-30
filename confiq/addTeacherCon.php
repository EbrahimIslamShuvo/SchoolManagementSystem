<?php

require_once('conection.php');
$_SERVER['REQUEST_METHOD']='POST';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName= $_POST['name'];
    $userId= $_POST['id'];
    $userNumber = $_POST['number'];
    $userEmail= $_POST['email'];
    $userPassword= $_POST['password'];
    $userType="teacher";
      
    if($con){
        $query = "SELECT * FROM users WHERE id = '$userId'";
        $result = mysqli_query($con ,$query); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==0){
            $sql="insert into users values ('$userName','$userId','$userNumber','$userEmail','$userPassword','$userType')";
            $result=mysqli_query($con,$sql);
        
            if($result){
                echo '<script>
                    alert("New Teacher Added Successfully");
                    window.location.href = "/School Management System/admin.php";
                </script>';

            }
            else{
                echo '<script>
                    alert("An error accour");
                    window.location.href = "\School Management System\admin.php";
                </script>';
            }
        }
        else{
            echo '<script>
                alert("This teacher id already exist in Database.");
                window.location.href = "/School Management System/admin.php";
            </script>';

        }
    }
    else{
        die(mysqli_error($con));
    }
}
?>