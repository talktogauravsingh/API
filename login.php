<?php
include_once("conn.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
if(isset($postdata) && !empty($postdata))
{
	
   $email = mysqli_real_escape_string($mysqli, trim($request->email));
   $psw = mysqli_real_escape_string($mysqli, trim($request->psw));
$sql='';
	$sql = "SELECT * FROM users where email='$email' and password='$psw'";
if($result = mysqli_query($mysqli,$sql))
{
 $rows = array();
  while($row = mysqli_fetch_assoc($result))
  {
    $rows[] = $row;
  }
 
  echo json_encode($rows);
}
else
{
  http_response_code(404);
}
}
?>