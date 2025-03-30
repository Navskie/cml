<?php
  include_once '../../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propertyId = isset($_POST['property_id']) ? $_POST['property_id'] : null;
    $iconFilename = isset($_POST['icon_filename']) ? $_POST['icon_filename'] : null;

    if ($propertyId && $iconFilename) {
        // Prepare the SQL query to insert the new amenity
        $query = "INSERT INTO property_amenities (property_id, filename) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $propertyId, $iconFilename);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Amenity added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add amenity']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    }
}
?>
