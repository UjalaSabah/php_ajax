<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "student");

// Check if 'editid' is sent in the POST request
if (isset($_POST['EditID'])) {
    $user_id = $_POST['EditID']; // Get the user ID from the POST request

    // SQL query to fetch user data by ID
    $query = "SELECT * FROM student_record WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query); // Execute the query

    // Check if any record is found
    if (mysqli_num_rows($result) > 0) {
        $response = mysqli_fetch_assoc($result); // Fetch the user data as an array
        echo json_encode($response); // Convert the data to JSON and send it back
    } else {
        // If no record is found, send an error message
        echo json_encode(["message" => "Invalid ID or data not found"]);
    }
} else {
    // If 'editid' is not sent in the request, send an error message
    echo json_encode(["message" => "Invalid request"]);
}
?>
