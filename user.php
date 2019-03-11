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
            if(isset($_POST['save'])){
                
               

                $name = $_POST['name'];
                $email = $_POST['email'];
                // $phone = $_POST['phone'];
                $address = $_POST['address'];
                $city = $_POST['city'];
                $code = $_POST['code'];
                // $password = $_POST['password'];
                $avatar_path = $conn->real_escape_string('L_assets/images/avatar/'.$_FILES['avatar']['name']);
                $cover_path = $conn->real_escape_string('L_assets/images/cover/'.$_FILES['cover']['name']);
              

                // if(preg_match('!image!', $_FILES['cover']['type'])){


                //     if(copy($_FILES['cover']['tmp_name'], $cover_path)){

                //         $sql = "UPDATE users SET cover = '$cover_path' WHERE email= '$id'";
                //         $res = mysqli_query($conn, $sql);
                //     }
                // }

                    if(isset($_FILES['cover'])){
                        $errors = array();
                        // $maxsize = '10M';
                        $maxsize = 10097252;
                        $acceptable = array(
                            'image/jpeg',
                            'image/jpg',
                            'image/gif',
                            'image/png'
                        );

                        if(($_FILES['cover']['size'] >= $maxsize) || ($_FILES['cover']['size'] == 0)){
                            $errors[] = 'File too large. File must be less than 2 megabytes.';
                        }

                        if((!in_array($_FILES['cover']['type'], $acceptable)) && (!empty($_FILES['cover']['type']))){
                            $errors[] = 'Invalid file type. only jpeg, jpg, gif and png are accepted';
                        }

                        if(count($errors) === 0){

                            if(copy($_FILES['cover']['tmp_name'], $cover_path)){

                                        $sql = "UPDATE users SET cover = '$cover_path' WHERE email= '$id'";
                                        $res = mysqli_query($conn, $sql);
                                    }
                        } else{
                            foreach($errors as $error){
                                echo '<script> alert("'.$error.'");</script>'; 
                            }
                            //  die();
                        }

                    }




                    if(isset($_FILES['avatar'])){
                        $errors = array();
                        // $maxsize = '10M';
                        $maxsize = 10097252;
                        $acceptable = array(
                            'image/jpeg',
                            'image/jpg',
                            'image/gif',
                            'image/png'
                        );

                        if(($_FILES['avatar']['size'] >= $maxsize) || ($_FILES['avatar']['size'] == 0)){
                            $errors[] = 'File too large. File must be less than 10 megabytes.';
                        }

                        if((!in_array($_FILES['avatar']['type'], $acceptable)) && (!empty($_FILES['avatar']['type']))){
                            $errors[] = 'Invalid file type. only jpeg, jpg, gif and png are accepted';
                        }

                        if(count($errors) === 0){

                            if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){

                                        $sql = "UPDATE users SET avatar = '$avatar_path' WHERE email= '$id'";
                                        $res = mysqli_query($conn, $sql);
                                    }
                        } else{
                            foreach($errors as $error){
                                echo '<script> alert("'.$error.'");</script>'; 
                            }
                            //  die();
                        }

                    }

                // //make sure file type is image
                // if(preg_match("!image!", $_FILES['avatar']['type'])){

                //     //copy image to images/avatar folder
                //     if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){

                //         $sql = "UPDATE users SET avatar ='$avatar_path' WHERE email='$id'";       
                //          $res = mysqli_query($conn,$sql);
                //     }

                // }

                
                
                if($name === ''){
                        
                    }else{
                         //SQL statement to enter the items in the database
                        $sql = "UPDATE users SET fullname ='$name' WHERE email='$id'";
                        $res = mysqli_query($conn,$sql);

                        if (!$res) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       } else {
                          
                            header('Location: user.php?id='.$id);
                       }
                        
                    }

                    if($email === ''){
                        
                    }else{
                        //SQL statement to enter the items in the database
                        $sql = "UPDATE users SET email ='$email' WHERE email='$id'";
                        $res = mysqli_query($conn,$sql);

                        if (!$res) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       } else {
                            header('Location: user.php?id='.$id);
                       }
                    }
                    
                    // if($phone === ''){
                        
                    // }else{
                    //     //SQL statement to enter the items in the database
                    //     $sql = "UPDATE users SET phone ='$role' WHERE email='$id'";
                    //     $res = mysqli_query($conn,$sql);

                    //     if (!$res) {
                    //         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    //    } else {
                    //         header('Location: user.php?id='.$id);
                    //    }
                    // }
                    
                    if($address === ''){
                        
                    }else{
                        //SQL statement to enter the items in the database
                        $sql = "UPDATE users SET address ='$address' WHERE email='$id'";
                        $res = mysqli_query($conn,$sql);

                        if (!$res) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       } else {
                            header('Location: user.php?id='.$id);
                       }
                    }
                    
                    if($city === ''){
                        
                    }else{
                        //SQL statement to enter the items in the database
                        $sql = "UPDATE users SET city ='$city' WHERE email='$id'";
                        $res = mysqli_query($conn,$sql);

                        if (!$res) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       } else {
                            header('Location: user.php?id='.$id);
                       }
                    }
                    
                    
                    if($code === ''){
                        
                    }else{
                        //SQL statement to enter the items in the database
                        $sql = "UPDATE users SET code ='$code' WHERE email='$id'";
                        $res = mysqli_query($conn,$sql);

                        if (!$res) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                       } else {
                            header('Location: user.php?id='.$id);
                       }
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
                <li class="active">
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
                <li>
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
                                <h4 class="title">Edit Profile</h4>
                            </div>

                            <div class="content">
                            <form method="post" action="" enctype="multipart/form-data" role="form">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Account Type</label>
                                                <input type="text" class="form-control" disabled placeholder="Account" value="<?php echo $row1['type']?>">
                                            </div>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Company" value="<?php echo $row1['fullname'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $row1['email'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Home Address" value="<?php echo $row1['address'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $row1['city'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" class="form-control" name="code" placeholder="ZIP Code" value="<?php echo $row1['code'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="Andrew">
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div> -->
                                        </div>
                                    </div>

                                    <button type="submit" id="av_btn" name="save" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image form-group">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                                <label for="cover">
                                  <?php if($row1['cover'] == ''){ ?>
                                  <img class="cover" style="cursor:pointer;" src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                  
                                  <?php }
                                        else {
                                  ?>
                                         <img class="cover" style="cursor:pointer;" src="<?php echo $row1['cover']?>" alt="..."/>
                                  
                                        <?php 
                                        }
                                        ?>    
                                  </label>
                                 
                                    <input type="file" class="form-control" name="cover" id="cover" style="display:none;" accept="image/*">

                           
                            </div>
                            <div class="content">
                                <div class="author form-group">
                                    <!-- <form action="" method="post"> -->
                                  <label for="avatar">
                                  <?php if($row1['avatar'] == ''){ ?>
                                  <img class="avatar border-gray" style="cursor:pointer;" src="assets/img/faces/face-0.jpg" alt="..."/>
                                  
                                  <?php }
                                        else {
                                  ?>
                                         <img class="avatar border-gray" style="cursor:pointer;" src="<?php echo $row1['avatar']?>" alt="..."/>
                                  
                                        <?php 
                                        }
                                        ?>    
                                  </label>
                                 
                                    <input type="file" class="form-control" name="avatar" id="avatar" style="display:none;" accept="image/*">

                                      <h4 class="title"><?php echo $row1['fullname'];?><br />
                                         <small><?php echo $row1['email'];?></small>
                                      </h4>
                                   
                                </div>
                                <!-- <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p> -->
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>
                </div>
   </form>

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

        document.getElementById('avatar').onchange = function(){
            document.getElementById('av_btn').click();
        };

        document.getElementById('cover').onchange = function(){
            document.getElementById('av_btn').click();
        };
    
    </script>

</html>
