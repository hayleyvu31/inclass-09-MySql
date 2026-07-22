<?php
require "db.php";

// Example update: Update salary for a specific employee
$newSalary = 78000.00;
$empId = 1; // Target ID

$stmt = $conn->prepare("UPDATE employees SET salary = ? WHERE emp_id = ?");
$stmt->bind_param("di", $newSalary, $empId);

if ($stmt->execute()) {
    echo "Success! Affected rows: " . $stmt->affected_rows;
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>