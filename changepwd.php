<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:index.php?action=login');
    exit('');
}
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
<body>
            <?php
                $id = $_GET['id'];
            ?>

<?php
            if(isset($_POST['savePwd'])){
                
                
                $oldPwd = $_POST['oldPwd'];
                $newPwd1 = md5($_POST['newPwd1']);
                $newPwd2 = $_POST['newPwd2'];
                
                $sql = "SELECT * FROM users  WHERE email='$id'";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($result);

                        if ($oldPwd === '') {
                            echo "<div class='error-msg'>
                              <i class='fa fa-times-circle'></i>
                                Please enter your current password
                           </div>";
     
                     }elseif ($oldPwd !== $row['password']) {
                             echo "<div id='incorrect' class='error-msg'>
                                         <i class='fa fa-times-circle'></i>
                                             incorrect password
                                     </div>";

                     }elseif($row['password'] === $oldPwd && $newPwd1 === "" || $newPwd2 === ""){
                             echo "<div class='error-msg'>
                                         <i class='fa fa-times-circle'></i>
                                           Enter your new password and confirm the password
                                  </div>";                
     
                     }elseif($row['password'] === $oldPwd && $newPwd1 === $newPwd2){
                             $sql = "UPDATE users SET password ='$newPwd1' WHERE email='$id'";
                             $res = mysqli_query($conn,$sql);
                             echo "<div class='success-msg'>
                                         <i class='fa fa-check'></i>
                                            Successfully Changed Password
                                  </div>";
     
                     }else{
                         echo "<div class ='error-msg'>
                                  <i class ='fa fa-times-circle'></i>
                                     Password do not match
                              </div>";
                     }
                
                    
            }//end of isset
        ?>

    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://http://localhost/J_CRED/" class="simple-text">
                   <img class="logo_i" src="./L_assets/images/jcred_logo.png" alt="" srcset="">
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php?id=<?php echo $id;?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li>
                    <a href="user.php?id=<?php echo $id;?>">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="users.php?id=<?php echo $id;?>">
                        <i class="pe-7s-note2"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="employmentdetails.php?id=<?php echo $id;?>">
                        <i class="pe-7s-albums"></i>
                        <p>Employment Details</p>
                    </a>
                </li>
                <li>
                    <a href="Admin.php?id=<?php echo $id;?>">
                        <i class="pe-7s-news-paper"></i>
                        <p>Administrators</p>
                    </a>
                </li>
                <li class = "active">
                    <a href="changepwd.php?id=<?php echo $id;?>">
                        <i class="pe-7s-key"></i>
                        <p>Change Password</p>
                    </a>
                </li>
             <!-- <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>
      
                    <?php
                    
                    $sql1= "SELECT * FROM users WHERE email='$id'";
                    $result1 = mysqli_query($conn,$sql1); 
                    $row1 = mysqli_fetch_array($result1);
       
                     ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo $row1['fullname'];?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      <!--   <li>
                            <a href="dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>-->
                    </ul> 

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="#">
                               <p>Account</p>
                            </a>
                        </li>
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> -->
                        <li>
                            <a href="index.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Password</h4>
                            </div>

                            <div class="content">
                            <form method="post" action="" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <!-- <div class="form-group">
                                                <label>Account Type</label>
                                                <input type="text" class="form-control" disabled placeholder="Account" value="<?php echo $row1['type']?>">
                                            </div> -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="michael23">
                                            </div> -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" value="">
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 i-center">
                                            <div class="form-group f-group">
                                                <label>Current Password</label>
                                                <input type="password" name="oldPwd" class="form-control" placeholder="Old Password">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                             <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $row1['email'];?>">
                                            </div> 
                                        </div> -->
                                    </div>

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
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                <?php if($row1['avatar'] == ''){ ?>
                                  <img class="avatar border-gray" style="cursor:default;" src="assets/img/faces/face-0.jpg" alt="..."/>
                                  
                                  <?php }
                                        else {
                                  ?>
                                         <img class="avatar border-gray" style="cursor:default;" src="<?php echo $row1['avatar']?>" alt="..."/>
                                  
                                        <?php 
                                        }
                                        ?>    
                                      <h4 class="title"><?php echo $row1['fullname'];?><br />
                                         <small><?php echo $row1['email'];?></small>
                                      </h4>
                                    </a>
                                </div>
                                <!-- <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p> -->
                            </div>
                            <hr>
                            <!-- <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div> -->
                        </div>
                    </div>
                </div>


        <footer class="footer">
            <div class="container-fluid">
                <!-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p> -->
            </div>
        </footer>

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

<script>
setTimeout(function(){
    document.getElementById("incorrect").style.display='none';
},3000);
</script>
</html>
