<?php
include_once '../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $amenities_id = $_POST['amenities_id']; // The ID of the amenity to edit
    $amenities_name = $_POST['amenities']; // New amenities name
    $file = $_FILES['file']; // The new file (if uploaded)

    // Check if amenities_id is valid
    if (empty($amenities_id) || !is_numeric($amenities_id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid amenities ID']);
        exit;
    }

    // Fetch the current file name from the database
    $query = "SELECT icons FROM amenities WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $amenities_id); // "i" means integer
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $old_file_name);
    mysqli_stmt_fetch($stmt);

    // Ensure that the first query completes before proceeding
    mysqli_stmt_close($stmt);  // Close the first query statement after fetching the result

    // Prepare the query to update the amenity name
    $update_query = "UPDATE amenities SET name = ? WHERE id = ?";
    $stmt_name = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt_name, "si", $amenities_name, $amenities_id); // "si" means string, integer

    // Execute the query to update amenities name
    if (!mysqli_stmt_execute($stmt_name)) {
        echo json_encode(['success' => false, 'message' => 'Failed to update amenity name: ' . mysqli_error($conn)]);
        exit;
    }

    // Ensure that the name update query completes before proceeding to file update
    mysqli_stmt_close($stmt_name);  // Close the name update statement

    // Check if a new file is uploaded
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        // Sanitize the file name and define the upload directory
        $file_name = basename($file['name']);
        $target_dir = "../../../img/amenities/"; // Directory where the file will be uploaded
        $target_file = $target_dir . $file_name;

        // Check if the file is an actual image (optional, for better security)
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            echo json_encode(['success' => false, 'message' => 'Uploaded file is not an image']);
            exit;
        }

        // Try to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            // If file upload is successful, update the record with the new file name

            // If there is an old file, delete it
            if ($old_file_name && file_exists("../../../img/amenities/" . $old_file_name)) {
                unlink("../../../img/amenities/" . $old_file_name);
            }

            // Update the database with the new file name
            $update_file_query = "UPDATE amenities SET icons = ? WHERE id = ?";
            $stmt_file = mysqli_prepare($conn, $update_file_query);
            mysqli_stmt_bind_param($stmt_file, "si", $file_name, $amenities_id); // "si" means string, integer

            // Execute the query to update the file name
            if (mysqli_stmt_execute($stmt_file)) {
                echo json_encode(['success' => true, 'message' => 'Amenity and file updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update file name: ' . mysqli_error($conn)]);
            }

            // Close the file update statement
            mysqli_stmt_close($stmt_file);
        } else {
            // If file upload failed
            echo json_encode(['success' => false, 'message' => 'Failed to upload the file']);
            exit;
        }
    } else {
        // No new file uploaded, so we only update the name
        echo json_encode(['success' => true, 'message' => 'Amenity updated successfully']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
