<?php
include_once("conn.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if(isset($postdata) && !empty($postdata))
{
  $coursetitle = mysqli_real_escape_string($mysqli, trim($request->coursetitle));
  $platform = mysqli_real_escape_string($mysqli, trim($request->platform));
  $certstatus = mysqli_real_escape_string($mysqli, trim($request->certstatus));
  $price = mysqli_real_escape_string($mysqli, trim($request->price));
  $exptime = mysqli_real_escape_string($mysqli, trim($request->exptime));
  $courseurl = mysqli_real_escape_string($mysqli, trim($request->courseurl));

  $sql = "INSERT INTO `courses`(`course_title`, `platform`, `certificate`, `Price`, `exp_time`, `course_url`) VALUES('$coursetitle', '$platform', '$certstatus', '$price', '$exptime', '$courseurl')";
 // echo $sql;
if ($mysqli->query($sql) === TRUE) {
 
    $authdata = [
      'coursetitle' => $coursetitle,
	    'platform' => $platform,
	    'certstatus' => $certstatus,
      'exptime' => $exptime,
      'courseurl' => $courseurl,
      'price' => $price,
      'Id'    => mysqli_insert_id($mysqli)
    ];

    echo json_encode($authdata);
 
}
}
?>