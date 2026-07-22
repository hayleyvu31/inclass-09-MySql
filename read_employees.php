<?php
require "db.php";

$sql = "SELECT * FROM employees ORDER BY emp_id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Employee Roster</h2>";
    echo "<table border='1' cellpadding='8' style='border-collapse:collapse;'>";
    echo "<tr><th>ID</th><th>Name</th><th>Job</th><th>Salary</th><th>Hire Date</th><th>Department</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["emp_id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["emp_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["job_name"]) . "</td>";
        echo "<td>$" . htmlspecialchars(number_format($row["salary"], 2)) . "</td>";
        echo "<td>" . htmlspecialchars($row["hire_date"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["department_name"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results found";
}

$conn->close();
?>