<?php
// Include database connection
include_once '../../../database/conn.php';

// Query to fetch properties (Only necessary columns)
$sql = "SELECT id, title, sqm, type, price, category FROM properties";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if data is returned
if (mysqli_num_rows($result) > 0) {
    // Prepare an array to store the result
    $properties = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $properties[] = $row;
    }

    // Return the data as JSON
    echo json_encode($properties);
} else {
    echo json_encode([]);
}

// Close the connection
mysqli_close($conn);
?>
