<?php
include_once '../../database/conn.php';

// Check if the property ID is passed via POST request
if (isset($_POST['property_id'])) {
    $propertyId = $_POST['property_id'];

    // Fetch images associated with this property
    $sql = "SELECT * FROM property_images WHERE property_id = '$propertyId'";
    $result = mysqli_query($conn, $sql);

    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row;
    }

    // Return the images as a JSON response
    echo json_encode(['status' => 'success', 'data' => $images]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Property ID not provided']);
}
?>
