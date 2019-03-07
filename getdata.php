<?php
include 'php/db.php';

$sel = mysqli_query($conn, "select * from users where type not like '%Admin'");
$data = array();


while($row = mysqli_fetch_array($sel)){
   
    $data[] = array("id"=>$row['uid'],
                    "fullname" =>$row['fullname'], 
                    "phone" =>$row['phone'], 
                    "type" =>$row['type'],
                    "email" =>$row['email']);
}
echo json_encode($data);

?>