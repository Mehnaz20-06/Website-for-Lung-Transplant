<?php 
  session_start();

if(isset($_SESSION['client_id']) && isset($_SESSION['email'])){
    $c_id = $_SESSION['client_id'];
    $c_em = $_SESSION['email'];
} else {
    // Redirect to the login page or handle the situation where the user is not logged in
    header("Location:../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body>
    
        <?php
            // include "../logincheck.php";
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "../dbconn.php";
        ?>

     <div id="main-content" class="container allContent-section py-4">
        <div class="row">
           
            <div class="col-sm-3">
            <div class="card">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Nurses</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from nurse";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                  ?> 
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Requests</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from booking where client_id='$c_id'";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result !== false && $result->num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
                </div>
                </div>
                 <div class="col-sm-3">
                <div class="card">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Total Requests Accepted</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from booking where client_id='$c_id' and status='Accepted'";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                  ?>
          </h5> 
              
            </div>  
            </div>
        </div>
        
    </div>
       
            
     
        <!-- --     --  if (isset($_GET['category']) && $_GET['category'] == "success") {
        --     //     echo '<script> alert("Category Successfully Added")</script>';
        --     // }else if (isset($_GET['category']) && $_GET['category'] == "error") {
        --     //     echo '<script> alert("Adding Unsuccess")</script>';
        --     // }
        --     // if (isset($_GET['size']) && $_GET['size'] == "success") {
        --     //     echo '<script> alert("Size Successfully Added")</script>';
        --     // }else if (isset($_GET['size']) && $_GET['size'] == "error") {
        --     //     echo '<script> alert("Adding Unsuccess")</script>';
        --     // }
        --     // if (isset($_GET['variation']) && $_GET['variation'] == "success") {
        --     //     echo '<script> alert("Variation Successfully Added")</script>';
        --     // }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
        --     //     echo '<script> alert("Adding Unsuccess")</script>';
        --     // } -->
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>l 