<?php
// Include your database connection
include_once '../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['category_id']) && isset($_POST['category'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category'];

        // Prepare SQL query to prevent SQL injection
        $sql = "UPDATE categories SET category_name = ? WHERE category_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("si", $category_name, $category_id);

            // Execute the query
            if ($stmt->execute()) {
                echo 'success';
            } else {
                echo 'error';
            }

            // Close the statement
            $stmt->close();
        } else {
            echo 'error';
        }
    } else {
        echo 'Invalid data.';
    }
}

$conn->close();
?>
