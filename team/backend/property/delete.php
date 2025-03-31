<?php
// Include database connection
include_once '../../database/conn.php';

// Check if ID is set
if (isset($_POST['id'])) {
    $propertyId = $_POST['id'];

    // Sanitize the property ID before using it in the query
    $propertyId = mysqli_real_escape_string($conn, $propertyId);

    // Prepare and execute the delete query
    $sql = "DELETE FROM properties WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter (property ID)
        $stmt->bind_param("i", $propertyId);

        // Execute the statement
        if ($stmt->execute()) {
            // Return success message
            echo "success";
        } else {
            // If an error occurs, return an error message
            echo "error";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return an error if the query preparation fails
        echo "error";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Return an error if no ID is provided
    echo "error";
}
?>