<?php 

include_once '../db/db.php';
// read the form values
$client = $_POST['namec'];
$stat = $_POST['namep'];
$qty = $_POST['qty'];
$kitrma = $_POST['kitrma'];
$datetask = date('Y-m-d');
$status = $_POST['status'];
$tracknumber = $_POST['shipment'];



//$datetask = date('Y-m-d, H:m:s');

$sql = "INSERT INTO tasks VALUES (NULL,'".$_POST['namec']."', '".$_POST['namep']."','".$_POST['qty']."', '".$_POST['kitrma']."', '$datetask', '$status', '$tracknumber')";

if (mysqli_query($conn, $sql)) {
  echo "New Task created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

echo "Task insert success";
header("Location: ../index.php");
exit();
?>