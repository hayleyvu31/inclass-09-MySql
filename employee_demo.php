<?php
require_once "db.php";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['emp_name'] ?? '');
  $job = trim($_POST['job_name'] ?? '');
  $salary = (float)($_POST['salary'] ?? 0);
  $hire = $_POST['hire_date'] ?? '';
  $deptId = (int)($_POST['department_id'] ?? 0);
  $deptName = trim($_POST['department_name'] ?? '');

  $stmt = $conn->prepare("INSERT INTO employees (emp_name, job_name, salary, hire_date, department_id, department_name) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdsis", $name, $job, $salary, $hire, $deptId, $deptName);

  if ($stmt->execute()) {
    $message = "Record saved successfully.";
  } else {
    $message = "Error: " . $stmt->error;
  }

  $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Employee Demo</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body class="demo-page">
  <div class="demo-wrap">
    <div class="demo-card">
      <h2 class="demo-title">Employee Demo Form</h2>
      <p class="demo-subtitle">Step 3 — Professional Build Demo</p>

      <?php if ($message): ?>
        <div class="demo-msg <?= strpos($message, 'Error') === false ? 'success' : 'error' ?>">
          <?= htmlspecialchars($message) ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="demo-grid">
          <div class="demo-field">
            <label class="demo-label">Employee Name</label>
            <input class="demo-input" name="emp_name" placeholder="Employee Name" required />
          </div>
          <div class="demo-field">
            <label class="demo-label">Job Title</label>
            <input class="demo-input" name="job_name" placeholder="Job Title" required />
          </div>
          <div class="demo-field">
            <label class="demo-label">Salary ($)</label>
            <input class="demo-input" name="salary" type="number" step="0.01" placeholder="Salary" required />
          </div>
          <div class="demo-field">
            <label class="demo-label">Hire Date</label>
            <input class="demo-input" name="hire_date" type="date" required />
          </div>
          <div class="demo-field">
            <label class="demo-label">Department ID</label>
            <input class="demo-input" name="department_id" type="number" placeholder="Department ID" required />
          </div>
          <div class="demo-field">
            <label class="demo-label">Department Name</label>
            <input class="demo-input" name="department_name" placeholder="Department Name" required />
          </div>
        </div>
        <div class="demo-actions">
          <button type="submit" class="demo-btn">Save Employee</button>
          <a href="read_employees.php" class="demo-link">View employee records &rarr;</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>