<?php
  include_once '../../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and use the category ID
    $categoryId = mysqli_real_escape_string($conn, $_POST['category']);
    // Retrieve POST data from AJAX request
    $title = isset($_POST['category_name']) ? mysqli_real_escape_string($conn, $_POST['category_name']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $status = isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
    $type = isset($_POST['project_type']) ? mysqli_real_escape_string($conn, $_POST['project_type']) : '';
    $sqm = isset($_POST['size']) ? mysqli_real_escape_string($conn, $_POST['size']) : ''; // No type conversion, keeping it as string
    $turnover = isset($_POST['turn_over_year']) ? mysqli_real_escape_string($conn, $_POST['turn_over_year']) : ''; // No type conversion, keeping it as string
    $price = isset($_POST['price']) ? mysqli_real_escape_string($conn, $_POST['price']) : '';
    $map_iframe = isset($_POST['map_iframe']) ? mysqli_real_escape_string($conn, $_POST['map_iframe']) : ''; // Get Google Map iframe code

    // Check if any required fields are empty
    if (empty($title) || empty($description) || empty($status) || empty($type) || empty($price) || empty($categoryId) || empty($address)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare the SQL query to insert the data into your database
    $sql = "INSERT INTO properties (title, description, status, type, sqm, turnover, price, map_iframe, category, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters, note that map_iframe is a string (TEXT type in DB)
        $stmt->bind_param("sssssissss", $title, $description, $status, $type, $sqm, $turnover, $price, $map_iframe, $categoryId, $address);
        
        // Execute the statement
        if ($stmt->execute()) {
            // If the insert was successful, return success
            echo "success";
        } else {
            // If there was an error during the execution, return error
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
