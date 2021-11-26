
<?php
echo $codet = $_POST['codethiden'] ;
echo $qty = $_POST['qty'];
$shipment = $_POST['shipment'];
$status = $_POST['status'];

include_once '../db/db.php';

$sql = "UPDATE tasks SET status='$status', quantity=$qty, tracknumber='$shipment' WHERE codetask=$codet";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

header("Location: ../index.php");
exit();

?>