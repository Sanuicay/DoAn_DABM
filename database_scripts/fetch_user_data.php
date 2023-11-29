<?php
$con = mysqli_connect("localhost:3307", "root", "", "doantest");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the phone number from the POST data
    $phoneNumber = $_POST["phone"];

    // Query the database for user information based on the phone number
    $query = "SELECT sur_name, last_name, email FROM user WHERE phone = '$phoneNumber'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Fetch the data as an associative array
        $userData = mysqli_fetch_assoc($result);

        // Return the user data as a JSON response
        echo json_encode($userData);
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
