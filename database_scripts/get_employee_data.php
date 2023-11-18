<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$search = $_POST['search'];
$query = "SELECT CONCAT(user.sur_name, ' ', user.last_name) AS 'Employee Name', employee.ID, employee.start_date, employee.employee_status FROM user, employee WHERE user.ID = employee.ID AND CONCAT(user.sur_name, ' ', user.last_name) LIKE '%$search%'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background-color: #f2f2f2;'><th style='padding: 8px; border: 1px solid #ddd;'>STT</th><th style='padding: 8px; border: 1px solid #ddd;'>Employee Name</th><th style='padding: 8px; border: 1px solid #ddd;'>ID</th><th style='padding: 8px; border: 1px solid #ddd;'>Start Date</th><th style='padding: 8px; border: 1px solid #ddd;'>Employee Status</th><th style='padding: 8px; border: 1px solid #ddd;'>Images</th></tr>";
    $stt = 1;
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td style='padding: 8px; border: 1px solid #ddd;'>" . $stt . "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["Employee Name"]. "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["ID"]. "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["start_date"]. "</td><td style='padding: 8px; border: 1px solid #ddd;'>" . $row["employee_status"]. "</td><td style='padding: 8px; border: 1px solid #ddd;'><a href='image1_url'><img src='image1_url' alt='Image 1' style='width: 50px; height: 50px;'></a> <a href='image2_url'><img src='image2_url' alt='Image 2' style='width: 50px; height: 50px;'></a></td></tr>";
        $stt++;
    }
    echo "</table>";
} else {
    echo "No results found";
}

mysqli_close($con);
?>