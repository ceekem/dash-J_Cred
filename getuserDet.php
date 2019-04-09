<?php
include 'php/db.php';


 $sel = mysqli_query($conn, "SELECT * FROM `users`,`employment_details`,`bank_preferences` WHERE users.email = employment_details.user_email AND users.email = bank_preferences.user_email AND type not like '%Admin'");
//$sel = mysqli_query($conn, "select * from users");

$data = array();


while($row = mysqli_fetch_array($sel)){
       $data[] = array("id" =>$row['uid'],
                        "fullname" =>$row['fullname'], 
                        "phone" =>$row['phone'], 
                        "type" =>$row['type'],
                        "email" =>$row['email'],
                        "address" => $row['address'],
                        "city" => $row['city'],
                        "code" => $row['code'],
                        "org" => $row['org'],
                        "status" => $row['status'], 
                        "employer" => $row['employer'],
                        "gross" => $row['gross'],
                        "nett" => $row['nett'],
                        "industry" => $row['industry'],
                        "position" => $row['position'],
                        "time" => $row['time'],
                        "contact" => $row['contact'],
                        "frequency" => $row['frequency'],
                        "day" => $row['day'],
                        "bank" => $row['bank'],
                        "account_number" => $row['account_number'],
                        "account_type" => $row['account_type'],
                        "account_holder" => $row['account_holder']);
}

echo json_encode($data);

?>