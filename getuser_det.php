<?php
include 'php/db.php';


$sel_e = mysqli_query($conn, "SELECT * FROM `users`,`employment_details`,`bank_preferences` WHERE users.email = employment_details.user_email AND users.email = bank_preferences.user_email");


$data_e = array();



while($row1 = mysqli_fetch_array($sel_e)){
       $data_e[] = array("id"=>$row1['id'],
                        "fullname" =>$row1['fullname'], 
                        "phone" =>$row1['phone'], 
                        "type" =>$row1['type'],
                        "email" =>$row1['email'],
                        "type" => $row1['type'],
                        "status" => $row1['status'], 
                        "employer" => $row1['employer'],
                        "gross" => $row1['gross'],
                        "nett" => $row1['nett'],
                        "industry" => $row1['industry'],
                        "position" => $row1['position'],
                        "time" => $row1['time'],
                        "contact" => $row1['contact'],
                        "frequency" => $row1['frequency'],
                        "day" => $row1['day'],
                        "bank" => $row1['bank'],
                        "account_number" => $row1['account_number'],
                        "account_type" => $row1['account_type'],
                        "account_holder" => $row1['account_holder']);
}

echo json_encode($data_e);

?>