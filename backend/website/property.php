<?php
// Assuming you have a database connection
$category = $_GET['category'];

// Example query to get properties for the selected category
$sql = "SELECT * FROM properties WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$properties = [];

while ($row = $result->fetch_assoc()) {
  $properties[] = [
    'name' => $row['name'],
    'thumbnail' => $row['thumbnail'],
    'size' => $row['size'],
    'type' => $row['type'],
    'turnOverDate' => $row['turn_over_date'],
    'price' => $row['price'],
  ];
}

echo json_encode($properties);
?>
