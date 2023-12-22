<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost:3307", "root", "", "dabm_database");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $data = json_decode(file_get_contents("php://input"));
    $book_ID = $data->bookID;
    // Query the database for user information based on the phone number
    $query = "SELECT book_ID, book_name FROM book WHERE book_ID";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        // Fetch the data as an associative array
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // Use prepared statements to prevent SQL injection
            $rows[] = $row;
        }
        http_response_code(200);
        $response = [
            'success' => true,
            'message' => 'Hello world',
            'userData' => $rows,
        ];
        echo json_encode($response);
        // Return the user data as a JSON response
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }

    //Close the database connection
    mysqli_close($con);
}
?>
