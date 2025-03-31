<?php


header('Content-Type: application/json');  // Set header for JSON output

include_once '../../database/conn.php';

error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting to see what's going on

// Fetch all categories from the database
$query = "SELECT * FROM categories";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $categories = [];

    // Fetch categories into an array
    while ($row = $result->fetch_assoc()) {
        $categories[] = [
            'id' => $row['category_id'],  
            'category_name' => $row['category_name'],
            'date_encoded' => $row['date_encoded'],  
        ];
    }

    // Return data as JSON
    echo json_encode(['data' => $categories]);
} else {
    echo json_encode(['data' => []]);  // Return empty array if no data
}
?>
