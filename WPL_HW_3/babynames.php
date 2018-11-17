<?php 
if(isset($_POST['year']) && isset($_POST['gender'])){
    $year = $_POST['year'];
    $gender = $_POST['gender'];
}
else{
    header("location: babynames.html");
}

$con = mysqli_connect('localhost','root','root','HW3');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM babynames WHERE gender LIKE '". $gender ."' and year LIKE '". $year ."' ORDER BY ranking ";
$result = mysqli_query($con,$sql);

$arr = array();
while($row = mysqli_fetch_array($result)) {
    array_push($arr, $row);
}

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode(array_values($arr));
exit();
?>
