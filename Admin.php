<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:index.php?action=login');
    exit('');
}
    ob_start();
    require('php/db.php');
    require('PHPMailerAutoload.php');


?>


<!doctype html>
<html lang="en" ng-app='myapp'>
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="./L_assets/images/j-Cred_ico.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PEOSA</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

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
    <link rel="stylesheet" type="text/css" href="assets/css/fpwdmodal.css">

</head>

<body>
            <?php
                $id = $_GET['id'];

                $sql1= "SELECT * from  users where email= '$id'";
                $res1 = mysqli_query($conn,$sql1);
                $row = mysqli_fetch_array($res1);
            ?>


<?php



            if(isset($_POST['save'])){
                
                $type = $conn->real_escape_string($_POST['type']);
                $name = $conn->real_escape_string($_POST['name']);
                $email = $conn->real_escape_string($_POST['email']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $address = $conn->real_escape_string($_POST['address']);
                $city = $conn->real_escape_string($_POST['city']);
                $code = $conn->real_escape_string($_POST['code']);
                $org = $conn->real_escape_string($_POST['org']);


                $sqlP="SELECT * FROM users WHERE email='$email'";
                $resultP=mysqli_query($conn,$sqlP);
                $rowP=mysqli_fetch_array($resultP);

  
             if($email != $rowP['email']) {
                 
                if ($row['type'] !== 'Super-Super-Admin') 
                {
                    
                        //SQL statement to enter the items in the database
                        $org2 = $row['org'];
                        $sql = "INSERT INTO users (type, fullname, email, org, phone, address, city, code)"
                             ."VALUES ('$type', '$name','$email','$org2', '$phone','$address', '$city', '$code')";
                        $res = mysqli_query($conn,$sql);
 
                        if (!$res) {
                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } else {
                         
                         header('Location: Admin.php?id='.$id);
                     }
                          
                }else{
                    //SQL statement to enter the items in the database
                    $org_table = strtolower(str_replace(' ', '', $org));

                    $sqlCreateOrg="CREATE TABLE $org_table (
                                                            uid int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                                            date_added datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
                                                            fullname varchar(255) NOT NULL,
                                                            phone varchar(11) NOT NULL,
                                                            email varchar(255) NOT NULL,
                                                            address varchar(255) NOT NULL,
                                                            city varchar(255) NOT NULL,
                                                            code varchar(255) NOT NULL,
                                                            password varchar(255) NOT NULL DEFAULT 'admin12',
                                                            type varchar(255) NOT NULL,
                                                            org varchar(225) NOT NULL,
                                                            avatar varchar(100) NOT NULL,
                                                            cover varchar(100) NOT NULL
                                                        ) ";
                    $res = mysqli_query($conn,$sqlCreateOrg);
                    //Insert the first super admin 
                    $sql = "INSERT INTO $org_table (type, fullname, email, org, phone, address, city, code)"
                            ."VALUES ('$type', '$name','$email','$org', '$phone','$address', '$city', '$code')";
                    $res2 = mysqli_query($conn,$sql);

                    if (!$res || !$res2) {
                        echo "Error: " . $sqlCreateOrg . "<br>" . mysqli_error($conn);
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        header('Location: Admin.php?id='.$id);
                    }
                }
            }else{
                //error message for email already exist
            }
        }
?>



    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo" style="width:239px">
                <a href="http://http://localhost/J_CRED/" class="simple-text">
                   <!-- <img class="logo_i" src="./L_assets/images/jcred_logo.png" alt="" srcset=""> -->
               
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 443.35 126.74"><defs><style>.cls-1{fill:#b7d93c;}.cls-2{fill:#f5c535;}.cls-3{fill:#614633;}.cls-4{fill:#ccbf81;}.cls-5{fill:#fb8f22;}.cls-6{fill:#ece0a5;}.cls-7{fill:url(#linear-gradient);}.cls-8{fill:#fff;}.cls-9{fill:#84bf03;}.cls-10{fill:#4e3a2c;}.cls-11{fill:#604533;}.cls-12{fill:#f7f5f4;}.cls-13{fill:#2e221a;}.cls-14{fill:#4d3a29;}</style><linearGradient id="linear-gradient" x1="358.36" y1="43.46" x2="406.54" y2="43.46" gradientUnits="userSpaceOnUse"><stop offset="0.06" stop-color="#bbe638"/><stop offset="0.2" stop-color="#b1e030"/><stop offset="0.43" stop-color="#95cf1a"/><stop offset="0.44" stop-color="#94ce19"/></linearGradient></defs><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M284.05,91.93a67.23,67.23,0,0,0-19.3-2.15,57.09,57.09,0,0,0-18.92,3.81,39.32,39.32,0,0,0-8.51,4.48A28,28,0,0,1,233,100.5c-1.53.68-3.08,1.22-4.64,1.74a44.54,44.54,0,0,1-9.68,2.17,23.32,23.32,0,0,1-10-1A27.38,27.38,0,0,1,200,98.07c-2.51-2.16-4.83-4.43-7.28-6.52a83.88,83.88,0,0,0-7.6-5.85c-1.35-.85-2.67-1.75-4.08-2.51s-2.77-1.58-4.21-2.28a70.15,70.15,0,0,0-18-6.21,50,50,0,0,0-9.36-.89,57.21,57.21,0,0,0-9.39.85c-6.24,1-12.68,2.94-19.58,3.08a46.71,46.71,0,0,1-5.15-.16,40.86,40.86,0,0,1-5.12-.87,35.5,35.5,0,0,1-5-1.58,38.77,38.77,0,0,1-4.67-2.4,53.19,53.19,0,0,1-8.13-6.21C90,64.29,87.68,62,85.34,59.8A100.08,100.08,0,0,0,70.5,48a76,76,0,0,0-8.21-4.61c-1.39-.72-2.85-1.31-4.28-2s-2.91-1.18-4.38-1.7a99.78,99.78,0,0,0-18.29-4.6,131.11,131.11,0,0,0-18.9-1.5c-5.48,0-11,.28-16.44.78V26.46c5.52-.34,11-.49,16.58-.33a138,138,0,0,1,19.94,2.1,106.76,106.76,0,0,1,19.39,5.41c1.57.61,3.11,1.29,4.66,2s3.06,1.41,4.54,2.22A82.4,82.4,0,0,1,73.79,43,104.79,104.79,0,0,1,89.15,55.84c4.69,4.59,9,9.39,14.1,12.64a34.53,34.53,0,0,0,4,2.17,31.42,31.42,0,0,0,4.26,1.45,36.26,36.26,0,0,0,4.46.88,39.16,39.16,0,0,0,4.6.26c6.17.06,12.41-1.57,19-2.53a62.32,62.32,0,0,1,10.05-.65,55,55,0,0,1,10,1.2,73.63,73.63,0,0,1,18.65,7c1.48.76,2.91,1.6,4.32,2.48s2.78,1.8,4.16,2.72a84.24,84.24,0,0,1,7.7,6.24c2.45,2.21,4.73,4.55,7.1,6.7a25.08,25.08,0,0,0,7.78,5.12,21.57,21.57,0,0,0,9.2,1.17,42.94,42.94,0,0,0,9.38-1.86c1.54-.48,3.08-1,4.54-1.57A27,27,0,0,0,236.64,97a41,41,0,0,1,4.28-2.46,47.74,47.74,0,0,1,4.56-1.91,57.63,57.63,0,0,1,19.26-3.37A67.28,67.28,0,0,1,284.05,91.93Z"/><path class="cls-2" d="M284.05,92.34a51.93,51.93,0,0,0-19.12-1.77,60.21,60.21,0,0,0-18.59,4.67,56.74,56.74,0,0,0-8.51,4.42,47.84,47.84,0,0,1-4.26,2.42c-1.48.72-3,1.34-4.51,1.93a48.7,48.7,0,0,1-9.43,2.76,25.28,25.28,0,0,1-10-.17,27.08,27.08,0,0,1-9.11-4.13,89.86,89.86,0,0,1-7.78-6c-2.48-2.06-5-4.07-7.54-5.9a70.59,70.59,0,0,0-8.09-5,60.36,60.36,0,0,0-17.76-6.11,48.63,48.63,0,0,0-18.57.39c-6.15,1.19-12.37,3.35-19.17,4a40.35,40.35,0,0,1-10.23-.29,36.74,36.74,0,0,1-9.86-3.09,48.7,48.7,0,0,1-8.71-5.3c-2.71-2-5.14-4.26-7.55-6.42A102.09,102.09,0,0,0,70.5,57.12,84.76,84.76,0,0,0,35.53,45,136,136,0,0,0,0,45.58v-8a142.61,142.61,0,0,1,36.51.47A100.33,100.33,0,0,1,55.9,43a89.34,89.34,0,0,1,9.21,4l2.22,1.16c.73.41,1.44.86,2.17,1.28,1.42.88,2.9,1.68,4.28,2.63A108.72,108.72,0,0,1,89,64.78c2.34,2.22,4.62,4.41,7,6.32A42.85,42.85,0,0,0,103.72,76,31.78,31.78,0,0,0,112.2,79a35.13,35.13,0,0,0,9.06.48c6.11-.38,12.27-2.31,18.81-3.43a52.42,52.42,0,0,1,19.92.11c1.63.37,3.22.68,4.85,1.15s3.18,1,4.73,1.59a71.6,71.6,0,0,1,9,4.17,72.72,72.72,0,0,1,8.28,5.36c2.63,2,5.12,4.1,7.55,6.23a89.42,89.42,0,0,0,7.43,6,24.79,24.79,0,0,0,8.31,4,23.39,23.39,0,0,0,9.25.38,46.8,46.8,0,0,0,9.18-2.44c1.51-.54,3-1.1,4.44-1.76s2.82-1.44,4.21-2.25A58.28,58.28,0,0,1,246,94.31a61.13,61.13,0,0,1,18.93-4.24A52.13,52.13,0,0,1,284.05,92.34Z"/><path class="cls-3" d="M284.05,92.76a45.17,45.17,0,0,0-9.42-1.8,42,42,0,0,0-9.57.34,66.37,66.37,0,0,0-18.24,5.6,87.61,87.61,0,0,0-8.49,4.42c-1.38.81-2.78,1.63-4.22,2.39s-2.93,1.42-4.39,2.07a57.31,57.31,0,0,1-9.18,3.32,27.39,27.39,0,0,1-9.89.7,28.63,28.63,0,0,1-9.52-2.84,45.14,45.14,0,0,1-8.28-5.36c-2.55-2-5-4.09-7.5-6a64.21,64.21,0,0,0-7.88-5.15,51.31,51.31,0,0,0-17.57-6,52.32,52.32,0,0,0-9.26-.52,51.23,51.23,0,0,0-9.18,1.28c-6.08,1.33-12.1,3.73-18.76,4.86a41.41,41.41,0,0,1-10.15.52,39.89,39.89,0,0,1-10-2.13,46.6,46.6,0,0,1-4.69-1.92c-.78-.36-1.55-.73-2.3-1.15s-1.49-.84-2.21-1.3a62,62,0,0,1-8-6.07c-2.47-2.14-4.82-4.27-7.23-6.24a76.84,76.84,0,0,0-7.51-5.43c-1.29-.84-2.68-1.52-4-2.29-.68-.37-1.33-.76-2-1.11l-2.08-1a80.28,80.28,0,0,0-8.61-3.35,87.86,87.86,0,0,0-18.13-3.69C23.91,53.7,11.85,54.7,0,56.81V48.76a136.78,136.78,0,0,1,36.56-.83A94.94,94.94,0,0,1,56,52.42a85.69,85.69,0,0,1,9.23,3.87l2.22,1.15c.74.39,1.45.84,2.17,1.26,1.43.87,2.91,1.66,4.29,2.6a81.29,81.29,0,0,1,7.93,6c2.5,2.16,4.86,4.41,7.19,6.53a56.55,56.55,0,0,0,7.17,5.78c.62.41,1.25.82,1.91,1.18s1.3.73,2,1.06a38.72,38.72,0,0,0,4.17,1.83A34.81,34.81,0,0,0,113,85.84a36.55,36.55,0,0,0,9-.24c6.06-.84,12.13-3,18.62-4.33A53.6,53.6,0,0,1,179,87.85,66.8,66.8,0,0,1,187,93.44c2.55,2,5,4.19,7.38,6.22,4.79,4.07,10.31,7.33,16.49,8.16a25.64,25.64,0,0,0,9.23-.43,54.79,54.79,0,0,0,9-3c1.48-.61,2.94-1.22,4.36-1.92s2.82-1.47,4.23-2.24A88.34,88.34,0,0,1,246.41,96,67,67,0,0,1,265,90.8a42.66,42.66,0,0,1,9.65-.09A44.93,44.93,0,0,1,284.05,92.76Z"/><path class="cls-4" d="M284.05,93.17A37.21,37.21,0,0,0,265.16,92,54,54,0,0,0,256,94.7c-.74.29-1.48.59-2.21.9s-1.45.67-2.17,1l-4.34,2c-5.82,2.6-11.15,6.18-17,8.94a73,73,0,0,1-8.92,3.83,30,30,0,0,1-9.73,1.61,33.68,33.68,0,0,1-4.93-.4,27.47,27.47,0,0,1-4.85-1.12,30.38,30.38,0,0,1-8.78-4.67c-2.63-2-5-4.1-7.49-6.09a60.65,60.65,0,0,0-7.65-5.42,44.85,44.85,0,0,0-17.43-6,51.9,51.9,0,0,0-9.23-.37,49.55,49.55,0,0,0-9.11,1.46c-6,1.48-11.87,4.09-18.34,5.73a44.1,44.1,0,0,1-10,1.4,40.45,40.45,0,0,1-10.12-1.14A45,45,0,0,1,94.11,93a45.64,45.64,0,0,1-8.47-5.62c-2.57-2.11-4.92-4.27-7.32-6.26a67.91,67.91,0,0,0-7.43-5.44c-.64-.43-1.31-.8-2-1.16l-2-1.11c-.67-.36-1.33-.75-2-1.1l-2.08-1a77.35,77.35,0,0,0-8.6-3.23A84,84,0,0,0,36.09,64.8c-12-.86-24.2.65-36.09,3.28V60c12-2.23,24.34-3.34,36.68-2.14a90.13,90.13,0,0,1,19.51,4,83.62,83.62,0,0,1,9.27,3.76l2.24,1.13c.73.4,1.44.84,2.17,1.25L72,69.28a24.5,24.5,0,0,1,2.13,1.33,73.94,73.94,0,0,1,7.89,6.1c2.48,2.16,4.79,4.4,7.12,6.42a40.62,40.62,0,0,0,7.36,5.17,39.8,39.8,0,0,0,8.38,3.25,36,36,0,0,0,17.88.21c6-1.33,12-3.81,18.45-5.24a53.5,53.5,0,0,1,9.87-1.32,56.47,56.47,0,0,1,9.91.66c.82.13,1.62.31,2.43.46s1.62.32,2.43.53a46.66,46.66,0,0,1,4.75,1.49,50.87,50.87,0,0,1,8.87,4.4,63.47,63.47,0,0,1,7.85,5.88c2.47,2.1,4.79,4.29,7.25,6.21a28.31,28.31,0,0,0,8,4.54,26.51,26.51,0,0,0,4.46,1.14,31.52,31.52,0,0,0,4.62.5,28,28,0,0,0,9.17-1.28,70.26,70.26,0,0,0,8.81-3.51c5.81-2.56,11.27-6,17.22-8.5l4.41-1.92c.74-.32,1.47-.65,2.21-1s1.51-.57,2.26-.84a53.67,53.67,0,0,1,9.32-2.51A37.56,37.56,0,0,1,284.05,93.17Z"/><path class="cls-5" d="M284.05,93.59a33.47,33.47,0,0,0-18.85-1c-6.2,1.5-11.78,4.8-17.49,7.65s-11.26,6.06-16.89,9.13c-2.83,1.52-5.67,3-8.68,4.3a33.06,33.06,0,0,1-9.52,2.51l-1.24.12-1.23,0c-.83,0-1.64,0-2.45,0a31,31,0,0,1-4.95-.38,19.74,19.74,0,0,1-4.84-1.45,19.13,19.13,0,0,1-2.28-1.1,22.17,22.17,0,0,1-2.14-1.3,77.22,77.22,0,0,1-7.57-6.17,61.73,61.73,0,0,0-7.4-5.77,44,44,0,0,0-4-2.28,40.43,40.43,0,0,0-4.27-1.71,47,47,0,0,0-27.33-.62c-6,1.6-11.68,4.39-17.92,6.56a42.59,42.59,0,0,1-20,2.22c-1.66-.33-3.34-.59-5-1l-2.45-.69-2.43-.86a37.22,37.22,0,0,1-9-5c-2.73-2-5.1-4.27-7.49-6.28A63.06,63.06,0,0,0,71.28,85a64.13,64.13,0,0,0-8.06-4.31,70.8,70.8,0,0,0-8.61-3.13,78.6,78.6,0,0,0-18.14-2.85C24.25,74.2,12,76.24,0,79.39V71.2c12-2.71,24.38-4.32,36.86-3.46A86.16,86.16,0,0,1,56.5,71.36,71.22,71.22,0,0,1,74.57,80a68.55,68.55,0,0,1,7.85,6.19c2.45,2.19,4.71,4.4,7.06,6.26A31.87,31.87,0,0,0,97.08,97l2.09.8,2.15.67c1.46.39,2.94.65,4.41,1a37.69,37.69,0,0,0,17.86-1.56c5.91-1.87,11.85-4.59,18.31-6.15a50,50,0,0,1,19.78-1l2.45.45a22.82,22.82,0,0,1,2.43.51,40.18,40.18,0,0,1,4.76,1.46,42.26,42.26,0,0,1,4.59,2,47,47,0,0,1,4.27,2.58,64,64,0,0,1,7.58,6.22,73.92,73.92,0,0,0,7.15,6.16,20.87,20.87,0,0,0,1.92,1.24,16.07,16.07,0,0,0,2,1,18.39,18.39,0,0,0,4.3,1.42,30.12,30.12,0,0,0,4.61.47c.79,0,1.59,0,2.35,0h1.17l1.16-.08c6.21-.4,12-3.27,17.68-6.15s11.37-5.89,17.14-8.69c2.89-1.4,5.77-2.79,8.7-4.12a46.57,46.57,0,0,1,9.12-3.13A33.7,33.7,0,0,1,284.05,93.59Z"/><path class="cls-6" d="M335,95a36.1,36.1,0,0,0-11.85,3.27,17,17,0,0,0-5.37,3.83,15.55,15.55,0,0,0-2.16,3c-5.75,10.23-6.78,12-8.3,13.73a22.83,22.83,0,0,1-6.43,5.09,16.94,16.94,0,0,0,3.09-1,20.44,20.44,0,0,0,4.17-2.55c1.83-1.47,2.86-3,5.67-7.33,4.07-6.27,4.83-7.62,6.83-9.22a17.76,17.76,0,0,1,4.62-2.64,1,1,0,0,1,.56.44c.5,1.08-2.32,2.93-4.39,5.39a23.68,23.68,0,0,0-4.17,9.48c-.65,3.56.55,5.38-1.15,8.41a10,10,0,0,1-1.31,1.79,8.9,8.9,0,0,0,2.42-2.06c1.66-2.05,1.39-3.67,2.56-7.17a36.09,36.09,0,0,1,2.94-6.18c1.21-2.21.93-1.18,3.52-5.17,1.23-1.89,1.9-3,3.33-3.5.21-.06,1.55-.49,2.27.16s.42,2,0,3.9c-1,4-1.44,6-1.88,7.17-.73,2-1.39,3.37-2.77,7.16-.45,1.26-.81,2.3-.63,2.39s1.49-1.75,1.89-2.37a31.79,31.79,0,0,0,2.1-3.74c1.75-3.73,1.79-5.3,3.19-8.73,2-4.81,3.25-5.32,3.27-7.9A9.8,9.8,0,0,0,335,95Z"/><path class="cls-7" d="M406.54,8.19A10.24,10.24,0,0,0,402.22,5a8.9,8.9,0,0,0-5.36-.11,10.19,10.19,0,0,0-3,1.56c-1,.82-2.81,2.89-3.3,9-.27,3.35.25,2.86.64,11.39a39.37,39.37,0,0,1-.45,9.67c-1,5.28-2.19,6.54-5.35,15.23-.35.94-2.53,7-4.55,14.88a39.51,39.51,0,0,0-1.48,8.4,39.94,39.94,0,0,0,.62,9.11c.17,1,.36,1.86.6,2.75-4.7-.82-6.35-2.18-6.71-3.54S375.06,80.9,376,78c.15-.47.29-.92.42-1.39,1-3.64,1.64-6.84,1.73-7.31,1.25-6.66,1.88-10.23,1.06-14.84-.1-.61-.22-1.12-.29-1.43h0a17.93,17.93,0,0,0-3.59-7.58c-.32-.43-1.27-1.53-3.19-3.72s-2.7-3-3.19-3.62a22.21,22.21,0,0,1-4.35-8.74c-.09-.27-.21-.66-.37-1.13-.76-2.22-1.15-3.33-1.76-4.05-.34-.4-1.42-1.5-4.08-1.58a5.34,5.34,0,0,1,3.21-.89,6.07,6.07,0,0,1,2.65.91A16.13,16.13,0,0,1,366.29,24a16.77,16.77,0,0,1,2.47,2.41,29.46,29.46,0,0,1,3.52,4.74,27.36,27.36,0,0,1,2.74,6c.27.84.11.37,1.15,3.55,1.44,4.45,2.14,6.3,3.35,8.37.3.52.57.94.73,1.19-.3-2.78-.68-5-1-6.47-.52-2.74-.9-3.94-1.34-6.53s-.58-4.43-.66-5.67c0,0,0,0,0-.05-.07-.32-.12-.64-.18-1a43.28,43.28,0,0,1-.62-6.86c0-.57,0-1,0-1.3a34.64,34.64,0,0,1,.86-6.88c.06-.26.12-.5.14-.55a23.83,23.83,0,0,1,.93-2.87s.09-.24.2-.49a20.06,20.06,0,0,1,9-9.93A14.65,14.65,0,0,1,398,.56,14.9,14.9,0,0,1,406.54,8.19Z"/><path class="cls-8" d="M390.71,4.88a11.8,11.8,0,0,0-4.1,2.86A12.41,12.41,0,0,0,384.08,12a27.52,27.52,0,0,0-1.38,9.86c0,1.67.16,3.37.31,5s.39,3.38.48,5.09c.2,3.37.29,6.94-1,10.13a17.39,17.39,0,0,0,.6-5,40.78,40.78,0,0,0-.33-5.05l-.65-5c-.18-1.71-.33-3.41-.37-5.13a25.45,25.45,0,0,1,1.67-10.17,13,13,0,0,1,2.89-4.3l1-.84c.35-.25.74-.45,1.1-.68l.56-.33.6-.23Z"/><path class="cls-8" d="M364,23.83a10.22,10.22,0,0,1,3.7,3,29.19,29.19,0,0,1,2.75,3.9,41.1,41.1,0,0,1,3.86,8.65c-1.64-2.71-3.13-5.46-4.72-8.14q-1.19-2-2.5-3.94A15.4,15.4,0,0,0,364,23.83Z"/><path class="cls-9" d="M390.72,13.86a45.78,45.78,0,0,0-1.11,13.26,37.59,37.59,0,0,1,.28,6.66,23.92,23.92,0,0,1-3.06,9.74s-1.53,3.83-3.72,9.2a25.82,25.82,0,0,0-1.91,6.52c-.12.9,0,1.76-.17,4.1-.08,1.51-.18,2.74-.25,3.57.57-2.34,1.46-5.72,2.77-9.75.78-2.39,1.43-4.15,2.7-7.56,3.44-9.3,3.85-9.45,4.35-12.23a49.58,49.58,0,0,0,.62-9.32,51.28,51.28,0,0,0-.26-5.49,48.28,48.28,0,0,1-.47-4.87A24.63,24.63,0,0,1,390.72,13.86Z"/><path class="cls-10" d="M362.51,106.88c-12.86,4.05-25.68-.29-28.63-9.68a14.42,14.42,0,0,1,.65-10,21.21,21.21,0,0,1,3.81-5.9l.05-.06a31.54,31.54,0,0,1,11.22-7.17l.38-.15c.64-.23,1.28-.46,1.95-.67.89-.28,1.78-.53,2.66-.73.32-.08.65-.16,1-.21a31.27,31.27,0,0,1,10.92-.49A21.41,21.41,0,0,1,374.63,75a14.33,14.33,0,0,1,5.8,7.53C383.39,91.94,375.36,102.83,362.51,106.88Z"/><path class="cls-11" d="M360.08,99.36c-12,3.79-23.48,1.08-25.71-6.07a8.52,8.52,0,0,1-.32-3.41c.58-5.85,6.74-12.1,15.62-15.55l.38-.15c.64-.23,1.29-.46,1.95-.67.89-.28,1.78-.53,2.66-.73.32-.08.66-.16,1-.21,8.76-1.86,16.77-.24,20.4,4a8.28,8.28,0,0,1,1.68,3C380,86.71,372.06,95.57,360.08,99.36Z"/><path class="cls-12" d="M374.66,78.43c-4.16-2-10.15-2.55-16.54-1.19a7.94,7.94,0,0,0-1,.2c-.88.21-1.76.44-2.64.73-.66.21-1.31.43-1.94.66l-.38.15c-6.89,2.66-12.13,7-14.37,11.54a5.27,5.27,0,0,1,0-.56c.51-5.09,5.9-10.53,13.68-13.54l.33-.12c.56-.21,1.13-.4,1.71-.59.78-.24,1.56-.46,2.33-.63.28-.07.57-.15.86-.2,7.67-1.61,14.68-.19,17.86,3.52Z"/><path class="cls-13" d="M376.64,82.27a33.12,33.12,0,0,1-20.72,13.52,34.05,34.05,0,0,1-20.08-1.62,56.8,56.8,0,0,0,17.59-1A55.17,55.17,0,0,0,376.64,82.27Z"/><path class="cls-14" d="M279.39,107.56V73.13a1.64,1.64,0,0,1,.37-1.21,1.67,1.67,0,0,1,1.22-.38h10.75A15.26,15.26,0,0,1,300,73.77q3.59,2.22,3.58,8.16a10.24,10.24,0,0,1-2.07,6.83,10.09,10.09,0,0,1-4.6,3.25,15.08,15.08,0,0,1-4.61.82h-8.21v14.73c0,.77-.71,1.16-2.12,1.16h-.42C280.09,108.72,279.39,108.33,279.39,107.56Zm12.92-18.75a7.11,7.11,0,0,0,4.34-1.54q2.07-1.53,2.07-5.34,0-3.56-2.12-5a8.94,8.94,0,0,0-5-1.4h-7.52V88.81Z"/><path class="cls-14" d="M310.58,108.25a1.73,1.73,0,0,1-.37-1.22V73.13a1.36,1.36,0,0,1,1.59-1.59h18.48a.89.89,0,0,1,.82.38,2.29,2.29,0,0,1,.24,1.21V74a2.33,2.33,0,0,1-.24,1.22.88.88,0,0,1-.82.37H314.87V87.65h13.82a.91.91,0,0,1,.83.37,2.41,2.41,0,0,1,.23,1.21v.85a2.45,2.45,0,0,1-.23,1.22.91.91,0,0,1-.83.37H314.87v12.92h15.47a.92.92,0,0,1,.82.37,2.35,2.35,0,0,1,.24,1.22V107a2.35,2.35,0,0,1-.24,1.22.92.92,0,0,1-.82.37H311.8A1.73,1.73,0,0,1,310.58,108.25Z"/><path class="cls-14" d="M392.08,108.19a11.85,11.85,0,0,1-4.08-1.8c-.67-.49-1-.93-1-1.32a3.6,3.6,0,0,1,.71-1.75q.72-1.11,1.14-1.11a3.8,3.8,0,0,1,1.11.53,21.87,21.87,0,0,0,3.52,1.53,13.9,13.9,0,0,0,4.48.64,7.2,7.2,0,0,0,5-1.72,5.78,5.78,0,0,0,1.94-4.53,5,5,0,0,0-1.06-3.26,7.94,7.94,0,0,0-2.57-2.06c-1-.51-2.46-1.14-4.37-1.88A40.08,40.08,0,0,1,392,89.23a8.58,8.58,0,0,1-3.07-3A9.5,9.5,0,0,1,387.68,81a9.09,9.09,0,0,1,1.46-5.09,9.7,9.7,0,0,1,4.13-3.47,14.46,14.46,0,0,1,6.17-1.24,18.83,18.83,0,0,1,4,.5,10.09,10.09,0,0,1,3.44,1.35c.71.42,1.06.88,1.06,1.38a3.78,3.78,0,0,1-.66,1.69c-.45.74-.79,1.11-1,1.11a1.77,1.77,0,0,1-.76-.26l-.67-.37a11.74,11.74,0,0,0-5.5-1.38,7.39,7.39,0,0,0-4.95,1.59,5.44,5.44,0,0,0-1.89,4.4,4.38,4.38,0,0,0,.93,2.91,6.2,6.2,0,0,0,2.12,1.67c.79.37,2.18.94,4.16,1.72a39.35,39.35,0,0,1,5.19,2.36,9.52,9.52,0,0,1,4.82,8.76,9.42,9.42,0,0,1-3.18,7.52q-3.18,2.76-8.58,2.76A21.91,21.91,0,0,1,392.08,108.19Z"/><path class="cls-14" d="M412.15,107.82a2.83,2.83,0,0,1,.16-.74l12.55-34.79c.22-.57.92-.85,2.12-.85h1.54c1.27,0,2,.28,2.12.85l12.55,34.84a1.9,1.9,0,0,1,.16.69q0,.9-2.28.9h-.42c-1.24,0-1.95-.28-2.12-.84l-3.13-8.69H419.83l-3,8.69c-.17.56-.88.84-2.11.84h-.27Q412.15,108.72,412.15,107.82ZM434,95.17l-5.56-15.79a24.74,24.74,0,0,1-.63-3.07h-.11a20.85,20.85,0,0,1-.79,3.07l-5.56,15.79Z"/></g></g></svg>
               
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
                    <a href="members.php?id=<?php echo $id;?>">
                        <i class="pe-7s-note2"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li>
                    <!-- <a href="employmentdetails.php?id=<?php //echo $id;?>">
                        <i class="pe-7s-albums"></i>
                        <p>Employment Details</p>
                    </a> -->
                </li>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="./admin.php?id=<?php echo $id;?>">Administrators</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                      <!--  <li>
                             <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown">
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
                           <a href="user.php?id=<?php echo $id;?>">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Administrators</h4>
                                
                                 <button class="category" <?php 
                                 if($row['type'] === 'Admin'){
                                     echo 'style="float: right; display:none"';
                                }
                                 ?> onclick="Modal.open('#modal02')" style="float: right; position: relative;bottom: 24px;"><i class="pe-7s-plus" style="padding-right: 5px;"></i>Add admin</button>
                             
                             <label class="sch"><span class="schlab">Search:  </span><input class="schtxt" ng-model="searchTxt"></label>
                            </div>
                            <div ng-controller="userCtrl" class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Admin Type</th>
                                    	<th>Phone</th>
                                    	<th>Email</th>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    if(($row['type'] === 'Super-Admin') || ($row['type'] === 'Admin')){
                                    ?>
                                    <!-- Display records  -->
                                        <tr ng-repeat="super in superAdmin | filter: '<?php echo $row['org'] ?>' | filter:searchTxt">
                                            <td>{{super.id}}</td>
                                            <td>{{super.fullname}}</td>
                                        	<td>{{super.type}}</td>
                                        	<td>{{super.phone}}</td>
                                            <td>{{super.email}}</td>
                                            <td>{{super.org}}</td>
                                        </tr>

                                        <?php
                                    }else{
                                        ?>
                                             <!-- Display records  -->
                                        <tr ng-repeat="super in superSAdmin | filter: '<?php echo $row['org'] ?>' | filter:searchTxt">
                                            <td>{{super.id}}</td>
                                            <td>{{super.fullname}}</td>
                                        	<td>{{super.type}}</td>
                                        	<td>{{super.phone}}</td>
                                        	<td>{{super.email}}</td>
                                        </tr>

                                        <?php 
                                    }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

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



<div class="overlay" id="modal02" data-backdrop>
  <form class="modal modal2" style="width: 100%;" method="post" action="" enctype="multipart/form-data" role="form">
    <header class="modal--header">
      <h3 class="modal--title">Add Administrator</h3>
      <button class="button" style="padding-left:101px; float:right;" data-type="icon" onclick="Modal.close(event)" data-modal-close><svg class="icon icon-clear" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></button>
    </header>
    <div class="modal--content">
       
       <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                    <?php 
                                 if($row['type'] === 'Super-Super-Admin'){
                                    echo '<select name="type" id="type" style="font-size: initial;"> 
                                            <option value="Admin">Admin</option>
                                            <option value="Super-Admin">Super-Admin</option>
                                            <option value="Super-Super-Admin">Super-Super-Admin</option>
                                          </select>     ';
                                }else if($row['type'] === 'Super-Admin'){
                                    echo '<select name="type" id="type" style="font-size: initial;"> 
                                             <option value="Admin">Admin</option>
                                             <option value="Super-Admin">Super-Admin</option>
                                          </select> ';
                                }
                                 ?>
    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Full Name</label> -->
                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Email</label> -->
                        <input type="text" name="email" class="form-control" placeholder="Email" value="" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Phone/label> -->
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Organization</label> -->
                        <input type="text" name="org" <?php 
                                 if($row['type'] != 'Super-Super-Admin'){
                                     echo 'style="float: right; display:none"';
                                }
                                 ?> class="form-control" placeholder="Organization">
                                
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <!-- <label>Address</label> -->
                        
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <!-- <label>Address</label> -->
                        <input type="text" class="form-control" name="address" placeholder="Home Address" value="" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <!-- <label>City</label> -->
                        <input type="text" class="form-control" name="city" placeholder="City" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <!-- <label>Postal Code</label> -->
                        <input type="number" class="form-control" name="code" placeholder="ZIP Code" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                   
                </div>
            </div>

    </div>
    <footer class="modal--footer">
      <button type="submit" name="save">Submit</button>
    </footer>
  </form>
</div>

<?php
 if(isset($_POST['save']) ){
                
	// $emailP=$_POST['emailP'];
	

//	is_numeric($item['quantity'])

	

				// if($email == ""){
		 
			 
				// }else {

                //     $mail = new PHPMailer;

                //     // $mail->SMTPDebug = 4;                               // Enable verbose debug output
        
                //     $mail->isSMTP();                                      // Set mailer to use SMTP
                //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
                //     $mail->Username = EMAIL;                 // SMTP username
                //     $mail->Password = PASS;                           // SMTP password
                //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                //     $mail->Port = 587;                                    // TCP port to connect to
        
                //     $mail->setFrom(EMAIL, 'PEOSA');
                //     $mail->addAddress($_POST['email']);     // Add a recipient
                //                      // Name is optional
                //     // $mail->addReplyTo('info@example.com', 'Information');
                //     // $mail->addCC('cc@example.com');
                //     // $mail->addBCC('bcc@example.com');
        
                //     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //     // $mail->addAttachment('/tmp/imag e.jpg', 'new.jpg');    // Optional name
                //     $mail->isHTML(true);                                  // Set email format to HTML
        
                //     $mail->Subject = "Create Password";
                //     $mail->Body    = "<a href='localhost/main/dash-J_Cred/recoverypwd.php?id=" . $emailP . "'>
                //                                                 <p>Link</p>
                //                                          </a>";
                     
                
        
                //             if(!$mail->send()) {
                //                     echo 'Message could not be sent.';
                //                     echo 'Mailer Error: ' . $mail->ErrorInfo;
                //         } else {
                //                     echo 'Message has been sent';
                //         }
                // }

					// 	$mail = new PHPMailer;

					// 	// $mail->SMTPDebug = 4;                               // Enable verbose debug output
			
					// 	$mail->isSMTP();                                      // Set mailer to use SMTP
					// 	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
					// 	$mail->SMTPAuth = true;                               // Enable SMTP authentication
					// 	$mail->Username = EMAIL;                 // SMTP username
					// 	$mail->Password = PASS;                           // SMTP password
					// 	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					// 	$mail->Port = 587;                                    // TCP port to connect to
			
					// 	$mail->setFrom(EMAIL, 'Peosa');
					// 	$mail->addAddress($_POST['email']);     // Add a recipient
					// 					 // Name is optional
					// 	// $mail->addReplyTo('info@example.com', 'Information');
					// 	// $mail->addCC('cc@example.com');
					// 	// $mail->addBCC('bcc@example.com');
			
					// 	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					// 	// $mail->addAttachment('/tmp/imag e.jpg', 'new.jpg');    // Optional name
					// 	$mail->isHTML(true);                                  // Set email format to HTML
			
					// 	$mail->Subject = "Password Recovery";
					// 	$mail->Body    = "<a href='localhost/main/dash-J_Cred/recoverypwd.php?id=" . $email . "'>
					// 												<p>Link</p>
					// 										 </a>";
						 
					
			
					// 			if(!$mail->send()) {
					// 					echo '<script type="text/javascript">
                    //                     $(document).ready(function(){
                                
                    //                         demo.initChartist();
                                
                    //                         $.notify({
                    //                             icon: "pe-7s-gift",
                    //                             message: "email to new created admin could not be sent</b>."
                                
                    //                         },{
                    //                             type: "info",
                    //                             timer: 4000
                    //                         });
                                
                    //                     });
                    //                 </script>.';
					// 					echo '<script type="text/javascript">
                    //                     $(document).ready(function(){
                                
                    //                         demo.initChartist();
                                
                    //                         $.notify({
                    //                             icon: "pe-7s-gift",
                    //                             message: "Error :- '. $mail->ErrorInfo .'</b>."
                                
                    //                         },{
                    //                             type: "info",
                    //                             timer: 4000
                    //                         });
                                
                    //                     });
                    //                 </script> ' ;

                                        
										
					// 		}else{
                    //             echo '<script type="text/javascript">
                    //                     $(document).ready(function(){
                                
                    //                         demo.initChartist();
                                
                    //                         $.notify({
                    //                             icon: "pe-7s-gift",
                    //                             message: "Administrator created</b>."
                                
                    //                         },{
                    //                             type: "info",
                    //                             timer: 4000
                    //                         });
                                
                    //                     });
                    //                 </script>';
                    //         }
					// }
    }
		
?>


</body>

   <!--   Core JS Files   -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script> -->
   <script src = "assets/js/angular.min.js"  type="text/javascript"></script> 
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

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
    <script src="assets/js/fpwdmodal.js"></script>

    <script>
    
             var fetch = angular.module('myapp', []);

            fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http){
             
                $http({
                    method: 'get',
                     url: 'getadminDATA.php'
                }).then(function successCallback(response){
                    //store response data
                    $scope.superAdmin = response.data;
                });


                $http({
                    method: 'get',
                     url: 'getsuperadminData.php'
                }).then(function successCallback(response){
                    //store response data
                    $scope.superSAdmin = response.data;
                });


            }]);


        </script>
</html>
