<?php 
include('.config.php');
// Paging parameters
$start = $_GET['start'];
$length = $_GET['length'];

// Search parameter
$searchValue = $_GET['search']['value'];

// Build the SQL query
$query = "SELECT * FROM notes";
if (!empty($searchValue)) {
    $query .= " WHERE title LIKE '%$searchValue%' OR description LIKE '%$searchValue%' OR image LIKE '%$searchValue%'";
}

// Add pagination to the query
$query .= " LIMIT $start, $length";

// Fetch data from the database with pagination

$result = $conn->query($query);

// Prepare the data array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Get the total number of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM notes";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];

// Prepare the response
$response = array(
    "draw" => intval($_GET['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
);

// Return the response as JSON
echo json_encode($response);

// Close the database connection
$conn->close();

?>