<?php
  include_once '../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propertyId = isset($_POST['property_id']) ? $_POST['property_id'] : null;
    $iconFilename = isset($_POST['icon_filename']) ? $_POST['icon_filename'] : null;

    if ($propertyId && $iconFilename) {
        // Prepare the SQL query to delete the amenity
        $query = "DELETE FROM property_amenities WHERE property_id = ? AND filename = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $propertyId, $iconFilename);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Amenity deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete amenity']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    }
}
?>
