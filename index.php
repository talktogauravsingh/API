<?php


include 'conn.php';
$courses = [];

$sql = "SELECT * FROM courses";
if($result = $mysqli->query($sql))
{
  $i = 0;
  while($row = $result->fetch_assoc())
  {
    $courses[$i]['id'] = $row['id'];
    $courses[$i]['coursetitle'] = $row['course_title'];
    $courses[$i]['platform'] = $row['platform'];
    $courses[$i]['certificate'] = $row['certificate'];
    $courses[$i]['price'] = $row['Price'];
    $courses[$i]['exptime'] = $row['exp_time'];
    $courses[$i]['courseurl'] = $row['course_url'];
    $i++;
  }
  echo json_encode($courses);
}
else
{
  http_response_code(404);
}