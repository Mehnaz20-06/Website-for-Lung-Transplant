<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM booking where booking_id='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"booking Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>