<?php

include 'php/db.php';
$sel = mysqli_query($conn, "SELECT users.uid, users.date_added, users.fullname, users.phone, users.email, users.address, users.city, users.code, users.password, users.type, users.org, users.avatar, users.cover, COUNT(documents.document) AS docNo
                            FROM users, documents WHERE users.email = documents.email AND users.type NOT LIKE('%Admin')");
//$sel = mysqli_query($conn, "select * from users WHERE type not like '%Admin'");
// $sel2 = mysqli_query($conn, "SELECT COUNT(documents.document) FROM users,documents WHERE users.email = documents.email AND  users.email = 'koni@gmail.com'"; 

$data = array();

    while($row = mysqli_fetch_array($sel)){
   
    $data[] = array("id"=>$row['uid'],
                    "fullname" =>$row['fullname'], 
                    "phone" =>$row['phone'], 
                    "type" =>$row['type'],
                    "org" => $row['org'],
                    "email" =>$row['email'],
                    "status" =>$row['mStatus'],
                    "docNo" =>$row['docNo']);
}
echo json_encode($data);



?>