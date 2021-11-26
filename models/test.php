<?php 
include_once '../db/db.php';

$sql = "UPDATE tasks SET status='Doneeee' WHERE codetask=9";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

