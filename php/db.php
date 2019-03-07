<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jcred';
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
?>