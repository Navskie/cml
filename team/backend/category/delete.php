<?php
// Include your database connection
include_once '../../database/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_POST['category_id'];

    // Delete category
    $sql = "DELETE FROM categories WHERE category_id='$category_id'";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
