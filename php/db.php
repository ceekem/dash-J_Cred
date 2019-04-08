<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'peo_test';

// $servername = 'localhost:3306';
// $username = 'binarjlg_peosa';
// $password = '8NVBFA2F1a=E';
// $dbname = 'binarjlg_admin';



//create connection to DB
$conn = new mysqli($servername,$username,$password,$dbname);
      // Check connection
		// if ($conn->connect_error) 
		// {
		// 	die("Failed To connect to database " . $conn->connect_error);
		// }
		// else
		// {
        //     echo "Connection successfull";
            
		// }
define('EMAIL','doe.mortu@gmail.com');
define('PASS', 'dnomyardoe');



?>