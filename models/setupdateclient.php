
<?php
echo $codeclient = $_POST['codehiden'] ;
echo $nameclient=$_POST['nameclient'];
echo $stat = $_POST['state'];
$city = $_POST['city'];
$tel = $_POST['tel'];


include_once '../db/db.php';

$sql = "UPDATE client SET stat='$stat', nameclient='$nameclient', city = '$city', tel = '$tel' WHERE codeclient=$codeclient";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header("Location: ./client.php");
exit();

?>