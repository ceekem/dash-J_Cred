<?php 
    require('php/db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>J-CRED</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
   <link rel="icon" type="image/png" href="./L_assets/images/j-Cred_ico.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./L_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./L_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./L_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="./L_assets/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="assets/css/fpwdmodal.css">

</head>
<body style="background-color: #666666;">
<?php
            if(isset($_POST['login'])){
                
                $password=$_POST['password'];
                $username=$_POST['username'];
                // $rememberme=$_POST['rememberme'];
                
                $sql="SELECT * FROM users WHERE email='$username'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                
                if($_POST['username'] ===''&&$_POST['password']===''){
                   
                     header('Location: index.php'); //reload the index page

                }
                else{
                     if($row['email']==$username&&$row['password']==$password){
                            if(strpos($row['type'], 'Admin') !== false){ 

                                 header('Location:dashboard.php?id='.$_POST['username']); // pass the user to the index page
							
								}else{

                                 header('Location: index.php'); // pass the user to the index page
                            }
                              
                      }else{
                          
                          $message = "Error - Email or Password incorrect";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                      }

                }//end of if
            }//end of isset
        ?>
        
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 login">
				<form class="login100-form validate-form" method="post" role="form" enctype="multipart/form-data" >
                   <div id="logo_p">
                    <img id="logo_i" src="./L_assets/images/jcred_logo.png" alt="logo">
                   </div>
                    <span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberme">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div> -->
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
						<br>
					<a class="login100-form-title p-b-43" onclick="Modal.open('#modal02')"><h6>Forgot Password</h6></a>


<!-- MODALS -->





					
					<!-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>

				<div class="login100-more" style="background-image: url('./L_assets/images/6.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="overlay" id="modal02" data-backdrop>
  <button class="button" data-type="icon" onclick="Modal.close(event)" data-modal-close><svg class="icon icon-clear" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></button>
  <form class="modal" onsubmit="return false;">
    <header class="modal--header">
      <h3 class="modal--title">Forget password</h3>
    </header>
    <div class="modal--content">
      <!-- <p>
        <label for="name">Name</label><br>
        <input id="name" type="text" name="fullname" autocomplete="fullname">
      </p> -->
      <p>
        <label class="btnemail" for="email">Email</label><br>
        <input id="email" type="email" name="email" autocomplete="email">
      </p>
      <!-- <p>
        <label for="subject">Subject</label><br>
        <input id="subject" type="text" name="subject" autocomplete="subject">
      </p> -->
      <!-- <p>
        <label for="message">Message</label><br>
        <textarea id="message" name="message"></textarea>
      </p> -->
    </div>
    <footer class="modal--footer">
      <button type="submit">Submit</button>
    </footer>
  </form>
</div>


	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./L_assets/js/main.js"></script>
	<script src="assets/js/fpwdmodal.js"></script>

</body>
</html>