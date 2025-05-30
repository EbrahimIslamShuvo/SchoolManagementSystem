<?php

require_once('conection.php');
$_SERVER['REQUEST_METHOD']='POST';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName= $_POST['name'];
    $userRoll= $_POST['roll'];
    $userPhone = $_POST['phone'];
    $userClass= $_POST['class'];
    $userShift= $_POST['shift'];
    $userYear= $_POST['year'];
      
    if($con){
        $query = "SELECT * FROM student WHERE (roll = '$userRoll' AND shift='$userShift' AND year ='$userYear')";
        $result = mysqli_query($con ,$query); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count==0){
            $sql="insert into student values ('$userName','$userRoll','$userPhone','$userClass','$userShift','$userYear')";
            $result=mysqli_query($con,$sql);
        
            if($result){
                echo '<script>
                    alert("New Student Added Successfully");
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
                alert("This student id already exist in Database.");
                window.location.href = "/School Management System/admin.php";
            </script>';

        }
    }
    else{
        die(mysqli_error($con));
    }
}
?>