<?php 

include_once '../db/db.php';
// read the form values
$client = $_POST['client'];
$stat = $_POST['state'];
$city = $_POST['city'];
$tel = $_POST['tel'];

//$datetask = date('Y-m-d, H:m:s');

$sql = "INSERT INTO client VALUES (NULL,'".$_POST['client']."', '".$_POST['state']."','".$_POST['city']."', '".$_POST['tel']."')";

if (mysqli_query($conn, $sql)) {
  echo "New Client created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

echo "client insert success";
header("Location: ./client.php");
exit();
?>