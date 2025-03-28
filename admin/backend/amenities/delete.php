<?php
  include_once '../../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amenities_id = $_POST['id']; // The ID of the amenity to delete
    $file_name = $_POST['file']; // The file name to delete from the server

    // Delete the record from the database
    $query = "DELETE FROM amenities WHERE id = $amenities_id";
    
    if (mysqli_query($conn, $query)) {
        // If the record is successfully deleted, delete the file
        $file_path = "../../../img/amenities/" . $file_name; // The file path
        if (file_exists($file_path)) {
            unlink($file_path); // Delete the file
        }

        echo json_encode(['success' => true, 'message' => 'Amenity and file deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete amenity']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
