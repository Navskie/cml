<?php

include_once '../../database/conn.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set JSON content type header
header('Content-Type: application/json');

// Check if category_id is provided in the GET request
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare the SQL query to get the category data
    $sql = "SELECT * FROM categories WHERE category_id = ?";
    
    // Prepare and bind parameters
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if the category was found
        if ($result->num_rows > 0) {
            $category = $result->fetch_assoc();
            echo json_encode($category);
        } else {
            echo json_encode(['error' => 'Category not found']);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Database query failed']);
    }
} else {
    echo json_encode(['error' => 'No category ID provided']);
}

$conn->close();
?>
