<?php

echo $codeclient = $_GET['codeclient'];

include_once '../db/db.php';
// sql to delete a record
$sql = "DELETE FROM client WHERE codeclient=$codeclient";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: ./client.php");
exit();


?>