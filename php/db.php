<?php
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'jcred';

$servername = 'localhost:3306';
$username = 'binarjlg_admin';
$password = 'bW[6i@Ro,I2-';
$dbname = 'binarjlg_admin';



//create connection to DB
$conn = new mysqli($servername,$username,$password,$dbname);
//       // Check connection
// 		if ($conn->connect_error) 
// 		{
// 			die("Failed To connect to database " . $conn->connect_error);
// 		}
// 		else
// 		{
// 			//echo "Connection successfull";
// 		}
define('EMAIL','vhuyositsula@gmail.com');
define('PASS', 'sitsulav');



?>