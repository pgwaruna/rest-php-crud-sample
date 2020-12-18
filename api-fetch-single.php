<?php
//use POST method in postman api

header("content-type: application/json");     //return json data

header("Access-Control-Allow-Origin: *");

//{"sid": "1"} data format

$data=json_decode(file_get_contents("php://input"),TRUE);

$student_id=$data['sid'];

include "config.php";

$sql="SELECT * FROM students WHERE id= {$student_id}";

$result=mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
  $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
  echo json_encode($output);
}else{
  echo json_encode(array("message"=> "No Records Found","status"=> FALSE));
}

?>
