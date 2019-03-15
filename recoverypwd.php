<?php 
// if(!isset($_SERVER['HTTP_REFERER'])){
//     // redirect them to your desired location
//     header('location:index.php?action=login');
//     exit('');
// }
    ob_start();
    require('php/db.php');
?>


<!doctype html>
<html lang="en" ng-app="myapp">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./L_assets/images/j-Cred_ico.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>J-Cred</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

   

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- profile picture  CSS     -->
    <link href="assets/css/profile.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <link href="assets/css/alertmessage.css" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />



    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body  style="background-image: url('./L_assets/images/66.jpg');">
            <?php
                $id = $_GET['id'];
            ?>

<?php
            if(isset($_POST['savePwd'])){
                
                $newPwd1 = md5($_POST['newPwd1']);
                $newPwd2 = $_POST['newPwd2'];
                
                $sql = "SELECT * FROM users  WHERE email='$id'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($result);

                        if ($newPwd1 === ''|| $newPwd2 === '') {
                            echo "<div id='incorrect2' class='error-msg2'>
                              <i class='fa fa-times-circle'></i>
                                Please enter your new password and confirm the password
                           </div>";
     

                        }elseif ($newPwd1 !== $newPwd2) {
                             echo "<div id='incorrect2' class='error-msg2'>
                                         <i class='fa fa-times-circle'></i>
                                             Password do not macth
                                     </div>";                
                        }else{
                            $sql = "UPDATE users SET password ='$newPwd1' WHERE email='$id'";
                            $res = mysqli_query($conn,$sql);
                            echo "<div id='success2' class='success-msg2'>
                                    <i class='fa fa-check'></i>
                                       Successfully Changed Password
                                    </div>";

                                   // header('Location: index.php?id='.$id);
                                
                                
                     }
                
                    
            }//end of isset
        ?>

   

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	      
                    <?php
                    
                    $sql1= "SELECT * FROM users WHERE email='$id'";
                    $result1 = mysqli_query($conn,$sql1); 
                    $row1 = mysqli_fetch_array($result1);
       
                     ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid2">
                <div class="row2">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Create New Password</h4>
                            </div>

                            <div class="content">
                            <form method="post" action="" enctype="multipart/form-data" role="form">                    
                                    <div class="row">
                                        <div class="col-md-12 i-center">
                                        <div class="form-group f-group">
                                                <label>New Password</label>
                                                <input type="password" name="newPwd1" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 i-center">
                                        <div class="form-group f-group">
                                                <label>Confirm Password </label>
                                                <input type="password" name="newPwd2" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row i-center">
                                         <button type="submit" name="savePwd" class="btn btn-info btn-fill pull-right">Change Password</button>
                                         <div class="clearfix"></div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
             </div>



</body>

    <!--   Core JS Files   -->
    <script src="./assets/js/angular.min.js"></script>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/profile.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>



</html>
