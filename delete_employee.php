<?php
require "db.php";

// Target ID to delete
$empId = 2; 

$stmt = $conn->prepare("DELETE FROM employees WHERE emp_id = ?");
$stmt->bind_param("i", $empId);

if ($stmt->execute()) {
    echo "Success! Deleted rows: " . $stmt->affected_rows;
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>