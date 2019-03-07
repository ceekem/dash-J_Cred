<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    require('db.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> J.CRED | Landing</title>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="KT Opportunities">
        <meta name="copyright" content="2018" />
        <link rel="icon" type="image/ico" href="images/jcred_logo.png">
        
        
        <!--uses these local .js and css files for the main slider-->
	<link href="http://www.sypensions.org.uk/webcomponents/test/calc/jquery-ui.css" rel="stylesheet">
	<script src="http://www.sypensions.org.uk/webcomponents/test/calc/external/jquery/jquery.js"></script>
	<script src="http://www.sypensions.org.uk/webcomponents/test/calc/jquery-ui.js"></script>
        
        <link rel="stylesheet" href="./L_assets/css/bootstrap.min.css" />
	<!-- fontawesome -->
	<link rel="stylesheet" href="./L_assets/css/font-awesome.min.css" />
	<!-- animate -->
<!--    <link  rel="stylesheet" type="text/css" href="css/animate.css"/>-->
	<!-- owl-carousel -->
<!--	<link rel="stylesheet" href="css/owl.carousel.css" />-->
	<!-- slicknav -->
        <link rel="stylesheet" href="./L_assets/css/slicknav.css">
        
        <link href="./L_assets/css/index.css" rel="stylesheet"> 
        <link rel="stylesheet" href="./L_assets/css/modal.css" type="text/css" media="all"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.css">
        
    </head>
    <body>
        <?php
            if(isset($_POST['login'])){
                
                $password=$_POST['password'];
                $username=$_POST['username'];
                
                $sql="SELECT * FROM users WHERE email='$username'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                
                if($_POST['username']===''&&$_POST['password']===''){
                     header('Location: index.php'); //reload the index page
                }
                else{
                     if($row['email']==$username&&$row['password']==$password){
                            if($row['type']==='admin'){
                                 header('Location:dashboard.php?id='.$_POST['username']); // pass the user to the index page
                            }else{
                                 header('Location: index.php'); // pass the user to the index page
                            }
                              
                      }
                }//end of if
            }//end of isset
        ?>
        
        
        
        <div class="container">
            <div class="row top-row">
                <div class="col-lg-3 col-md-3 col-sm-3 logo">
                    <a href="index.php"><img src="images/jcred_logo.png" id="logo" alt="Logo"></a>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6">
                             <a class="btn one"  href="investor.php">Invest With J.Cred</a>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                             <a class="btn one"  href="index.php">Take A Loan</a>
                         </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6">
                             <a class="btn two"  href="#">How J.cred works</a>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6">
                             <a class="btn two"  href="contact.php">Contact</a>
                         </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-3 login">
                    <form method="post" action="" enctype="multipart/form-data" role="form" class="form-inline">
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-4">
                                <input class="form-control username" type="text" name="username" placeholder="Username" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-4 col-md-4 col-sm-4">
                                <input class="form-control password" type="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-4 col-md-4 col-sm-4">
                                <button class="sub" name="login">Login</button>
                            </div>
                        </div>     
                     </form>
                </div>
            </div>
            
            <div class="row middle-row">
                <div class="form-group col-lg-4 col-md-4 col-sm-4 first">
                    <a href="#" class="how-to">How To Apply</a>
                    
                    <p>Up to R4000 for new customers.<br>Up to R8000 for existing customers.<br>now with 6 months to pay</p>
                    <h1>You will need the following:</h1>
                    
                    <a style="color: #f7f7f7;"><img src="images/Group 41.svg" id="icon" alt="Logo"></a>
                    <a style="color: #f7f7f7;"><img src="images/Group 78.svg" id="icon" alt="Logo"></a><br>
                    <a style="color: #f7f7f7;"><img src="images/Group 79.svg" id="icon" alt="Logo"></a>
                    <a style="color: #f7f7f7;"><img src="images/Group 80.svg" id="icon" alt="Logo"></a>
                    
                </div>
                
                <div class="form-group col-lg-8 col-md-8 col-sm-8 second">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 one">
                        
                        <p id="money">How much do you need?</p>
                        <p id="length">Over how many days?</p>
                        <div class="slidecontainer" style="margin-top: 70%;">
                           
                            <input type="range" min="500" max="4000" value="0" id="myRange">
                            <p id="amount">R<span id="demo"></span></p>
                            
                           
                            <input type="range" min="1" max="6" value="1" id="myRange1">
                            <p id="period"><span id="demo1"></span>months</p>
                            
                            
<!--                            scripting for loan calculation-->

                            <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
                            <script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
                            <script src="js/index.js"></script>
                            
                        </div>
                        
                        
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 two">
                        <p id="loan-amount">Loan Amount</p>
                        <p id="loan-period">Loan Period</p>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-2 three">
                        <p id="totalp">R<span id="total"></span></p>
                        <p1>1 x installment</p1>
                        <p id="interestp">R<span id="interest"></span></p>
                        <p1>Interest & Fees</p1>
<!--                        <a class="btn threeBtn"  href="#">Apply Now</a>-->
                        <a  class="btn threeBtn" data-modal="modalOne">Apply Now</a> 
                    </div>
                </div>
            </div>
            
        </div>
        
        <!--Modal to upload the files-->
        <div id="modalOne" class="modal">
            <div class="menu-modal-content1">
                <div class="menu-modal-body1">
                    
                   <?php if(isset($_POST['login'])){
                            
                            $fullname = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $confirm = $_POST['confirm'];
                            $type = "lendee";
                            
                            if($password !== $confirm){
                                header('Location: index.php?'); 
                            }else{
                                //SQL statement to enter the items in the database
                                $sql = "INSERT INTO users (fullname, phone, email, password, type) 
                                    VALUES ('$fullname', '$phone', '$email', '$password', '$type')";
                                    $res = mysqli_query($conn,$sql);
                            }
                             $fullname = "";
                            $phone = "";
                            $email = "";
                            $password = "";
                            $confirm = "";
                   }
                   
                     ?>
                    
                    
                    <a class="close11"><img src="images/blog_back.png" alt=""/></a><br><br>    
                    
                    <form method="post" action="" enctype="multipart/form-data" role="form" class="form-inline">
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control name" type="text" name="name" placeholder="Full Name" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control phone" type="text" name="phone" placeholder="Phone Number" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control email" type="text" name="email" placeholder="Email" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control password" type="password" name="password" placeholder="Password" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control confirm" type="password" name="confirm" placeholder="Confirm Password" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <button class="sub" name="login">Register</button>
                            </div>
                        </div>     

                     </form>
                    
                    
                </div>     
            </div>      
        </div> <!--end of modalOne-->
        
        <script>
                 
            var slider = document.getElementById("myRange");
            var output = document.getElementById("demo");
            var slider1 = document.getElementById("myRange1"); //script for period
            var output1 = document.getElementById("demo1"); //script for period
            
            var totaloutput = document.getElementById("total"); //display results
            var interestoutput = document.getElementById("interest"); //display results
            var aproutput = document.getElementById("apr"); //display results
            
            output.innerHTML = slider.value;
            output1.innerHTML = slider1.value; //script for period
            
            
            //Loan calculations
            var amount = slider.value;
            var months = slider1.value;
            var interest = 0.764825 ;
            var loanAmount = parseInt(slider.value) * (1 + (interest * months/12));
            
            
            totaloutput.innerHTML = parseFloat(parseInt(slider.value) * (1 + (interest * months/12))).toFixed(2); //keeps the initial value for the intial loan amount
            interestoutput.innerHTML = parseFloat((totaloutput.innerHTML) - slider.value).toFixed(2);
            
             slider.oninput = function() {
                output.innerHTML = this.value;
                //calculating loan amount
                totaloutput.innerHTML = parseFloat(parseInt(slider.value) * (1 + (interest * months/12))).toFixed(2);
                interestoutput.innerHTML = parseFloat((totaloutput.innerHTML) - slider.value).toFixed(2);
            }
            
            //displaying to the user interface
            slider1.oninput = function() {  //script for period
                output1.innerHTML = this.value;
                interest = 0.764825 ;
                interest = interest*this.value;
                totaloutput.innerHTML = parseFloat(parseInt(slider.value) * (1 + (interest * months/12))).toFixed(2);
                interestoutput.innerHTML = parseFloat((totaloutput.innerHTML) - slider.value).toFixed(2);
            }
            
          
            
        </script>
        
        
        <script>
            //home
            var modalBtns = [...document.querySelectorAll(".button,.threeBtn")];
            modalBtns.forEach(function(btn){
                btn.onclick = function() {
                    var modal = btn.getAttribute('data-modal');
                    document.getElementById(modal).style.display = "block";
                }
            });

            var closeBtns = [...document.querySelectorAll(".close1,.close11")];
            closeBtns.forEach(function(btn){
                btn.onclick = function() {
                    var modal = btn.closest('.modal');
                    modal.style.display = "none";
                }
            });

            window.onclick = function(event) {
                if (event.target.className === "modal") {
                    event.target.style.display = "none";
                }
            }
        </script>  
        
        
    </body>
</html>
