<?php
include_once '../../database/conn.php';

if (isset($_POST['image_id']) && isset($_POST['image_name']) && isset($_POST['property_id'])) {
    $imageId = $_POST['image_id'];
    $imageName = $_POST['image_name'];
    $propertyId = $_POST['property_id'];

    // Path to the image
    $imagePath = "../../../img/properties/{$propertyId}/{$imageName}";

    // Delete the image file from the server if it exists
    if (file_exists($imagePath)) {
        if (!unlink($imagePath)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the image file.']);
            exit();
        }
    }

    // Ensure correct table name (e.g., `property_images` or `images`)
    $deleteQuery = "DELETE FROM property_images WHERE id = $imageId AND property_id = $propertyId"; // Modify table name if needed

    if (mysqli_query($conn, $deleteQuery)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete image from database']);
    }

    mysqli_close($conn);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
}
?>
