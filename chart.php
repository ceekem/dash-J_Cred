<?php
include 'php/db.php';

$selA = mysqli_query($conn, "select count(type) from users where type = ('admin')");

$selL = mysqli_query($conn, "select count(type) from users where type = ('lendee')");

$selI = mysqli_query($conn, "select count(type) from users where type = ('investor')");

$dataA = $selA;

$dataL = $selL;

$dataI = $selI;

$data[] = array("admin" => $selA,
                 "lendee" => $selL,
                  "investors" => $selI);


echo json_encode($data);

// while($row = mysqli_fetch_array($selA)){
   
//     $dataA[] = array("id"=>$row['uid'],
//                     "fullname" =>$row['fullname'], 
//                     "phone" =>$row['phone'], 
//                     "type" =>$row['type'],
//                     "email" =>$row['email']);
// }

// echo json_encode($dataA);

// echo json_encode($dataL);

// echo json_encode($dataI);

?>