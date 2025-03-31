<?php
include_once '../../database/conn.php';

// Check if the form is submitted and files are uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $propertyId = $_POST['property_id'];  // Retrieve the property ID sent from AJAX

    // Handle the uploaded files
    $uploadedImages = [];
    $errors = [];

    // Create the directory for the property ID if it doesn't exist
    $uploadDir = '../../../img/properties/' . $propertyId . '/';  // Directory where files will be saved
    if (!file_exists($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            $errors[] = "Failed to create directory for property ID: $propertyId";
        }
    }

    // Loop through all uploaded files
    foreach ($_FILES['file']['name'] as $index => $fileName) {
        // Get file details
        $tmpName = $_FILES['file']['tmp_name'][$index];
        $fileSize = $_FILES['file']['size'][$index];
        $fileType = $_FILES['file']['type'][$index];
        
        // Generate a unique file name (e.g., IMG001, IMG002, etc.)
        $imageName = 'IMG' . str_pad($index + 1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadPath = $uploadDir . $imageName;

        // Check for errors
        if ($_FILES['file']['error'][$index] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading file: " . $fileName;
            continue;
        }

        // Move the file to the desired location
        if (move_uploaded_file($tmpName, $uploadPath)) {
            // Add the uploaded file to the array
            $uploadedImages[] = $imageName;

            // Optionally: Insert the image into the database for the property
            $sql = "INSERT INTO property_images (property_id, filename) VALUES ('$propertyId', '$imageName')";
            if (!mysqli_query($conn, $sql)) {
                $errors[] = "Failed to insert image into database: " . mysqli_error($conn);
            }
        } else {
            $errors[] = "Failed to move uploaded file: " . $fileName;
        }
    }

    // Check if any images were uploaded successfully
    if (empty($errors)) {
        echo json_encode(['status' => 'success', 'message' => 'Images uploaded successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => implode(', ', $errors)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No files were uploaded.']);
}
?>
