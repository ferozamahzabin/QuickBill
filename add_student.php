<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'quickbill');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // Get the form data
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $contact_number = $_POST['contact_number'];
    $parent_email = $_POST['parent_email'];

    // SQL query to insert student data into the Students table
    $sql = "INSERT INTO Students (student_id, name, grade, contact_number, parent_email) 
            VALUES ('$student_id', '$name', '$grade', '$contact_number', '$parent_email')";

    // Execute the query and check for errors
    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message'>Student added successfully!</div>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Close the database connection
    $conn->close();
}
?>

<?php include 'header.php'; ?> <!-- Include navigation bar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2 class="page-title">Add Student</h2>
        <form method="POST" action="add_student.php" class="form-style">
            <label for="student_id">Student ID:</label>
            <input type="number" name="student_id" required>

            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="grade">Grade:</label>
            <input type="text" name="grade" required>

            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" required>

            <label for="parent_email">Parent Email:</label>
            <input type="email" name="parent_email" required>

            <button type="submit" name="submit" class="btn">Add Student</button>
        </form>
    </div>
</body>
</html>
