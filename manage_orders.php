<?php include 'header.php'; ?>
<div class="container">
    <h2>Manage Orders</h2>
    <form method="POST" action="manage_orders.php">
        <label for="student_id">Student ID:</label>
        <input type="number" name="student_id" required>
        <label for="food_name">Food Name:</label>
        <input type="text" name="food_name" required>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required>
        <button type="submit">Add Order</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $student_id = $_POST['student_id'];
        $food_name = $_POST['food_name'];
        $price = $_POST['price'];

        $conn = new mysqli('localhost', 'root', '', 'quickbill');
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        // Insert Order
        $order_sql = "INSERT INTO Orders (student_id, order_date, total_price) VALUES ('$student_id', CURDATE(), 0)";
        if ($conn->query($order_sql)) {
            $order_id = $conn->insert_id;

            // Insert Food Item
            $item_sql = "INSERT INTO Order_Items (order_id, food_name, price) VALUES ('$order_id', '$food_name', '$price')";
            $conn->query($item_sql);

            // Update Total Price
            $update_sql = "UPDATE Orders SET total_price = total_price + $price WHERE order_id = $order_id";
            $conn->query($update_sql);

            echo "Order added successfully!";
        } else echo "Error: " . $conn->error;

        $conn->close();
    }
    ?>
</div>
