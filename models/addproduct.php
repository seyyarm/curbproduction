<?php 

include_once '../db/db.php';
// read the form values
$name = $_POST['name'];
$sn = $_POST['pn'];


//$datetask = date('Y-m-d, H:m:s');

$sql = "INSERT INTO product VALUES (NULL,'".$_POST['name']."', '".$_POST['pn']."')";

if (mysqli_query($conn, $sql)) {
  echo "New Product created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

echo "product insert success";
header("Location: ./product.php");
exit();
?>