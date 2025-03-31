<?php
  include_once '../../database/conn.php';

// Get the property ID from the URL or request
$propertyId = isset($_GET['id']) ? $_GET['id'] : null;

if ($propertyId) {
    // Prepare the SQL query to get the amenities for the property
    $query = "SELECT * FROM property_amenities WHERE property_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $propertyId);
    $stmt->execute();
    $result = $stmt->get_result();

    $amenities = [];
    while ($row = $result->fetch_assoc()) {
        $amenities[] = $row;
    }

    // Return the amenities as JSON
    echo json_encode($amenities);
} else {
    echo json_encode([]);
}
?>
