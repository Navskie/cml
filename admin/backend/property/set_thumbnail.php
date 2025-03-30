<?php
include_once '../../../database/conn.php';

$response = ['status' => 'error', 'message' => 'Failed to set thumbnail'];

if (isset($_POST['id'])) {
    $imageId = $_POST['id'];

    // Set the image as the profile thumbnail by updating the database
    $query = "UPDATE property_images SET is_thumbnail = 1 WHERE id = $imageId";
    if (mysqli_query($conn, $query)) {
        // Reset any other images that were set as thumbnail
        $resetQuery = "UPDATE property_images SET is_thumbnail = 0 WHERE id != $imageId";
        mysqli_query($conn, $resetQuery);

        $response['status'] = 'success';
        $response['message'] = 'Thumbnail set successfully!';
    }
}

mysqli_close($conn);
echo json_encode($response);
