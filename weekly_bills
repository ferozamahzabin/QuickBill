<?php
include 'header.php';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'quickbill');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch students from the database
$sql = "SELECT student_id, name, grade, contact_number, parent_email FROM Students";
$result = $conn->query($sql);
?>

<div class="container">
    <h2 class="page-title">View All Students</h2>
    <table class="table-style">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Contact Number</th>
                <th>Parent Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['grade']); ?></td>
                        <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['parent_email']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $conn->close(); ?>
