<?php
global $codetask;
$codetask = $_GET['codetask'];

include_once '../db/db.php';
// sql to delete a record
$sql = "DELETE FROM tasks WHERE codetask=$codetask";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: ../index.php");
exit();


?>

