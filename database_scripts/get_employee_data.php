<?php
// Connect to your database
// $con = mysqli_connect("localhost:3307","root","","doan");
include_once("../connection.php");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$search = $_POST['search'];
$search = str_replace(' ', '', $search);
$search = str_replace('(', '', $search);
$search = str_replace(')', '', $search);
$search = str_replace(';', '', $search);
$search = strtolower($search);

// SELECT CONCAT(user.sur_name, ' ', user.last_name) AS 'Employee Name', employee.ID, employee.start_date
// FROM user, employee
// WHERE user.ID = employee.ID;

$sql = "SELECT CONCAT(user.sur_name, ' ', user.last_name) AS 'Employee Name', employee.ID, employee.start_date
        FROM user, employee
        WHERE user.ID = employee.ID
        AND REPLACE(LOWER(CONCAT(user.sur_name, ' ', user.last_name)), ' ', '') LIKE '%{$search}%'
        ORDER BY employee.start_date DESC;";
$result = mysqli_query($con, $sql);

//if not found any result search by ID
if (mysqli_num_rows($result) <= 0) {
    $sql = "SELECT CONCAT(user.sur_name, ' ', user.last_name) AS 'Employee Name', employee.ID, employee.start_date
            FROM user, employee
            WHERE user.ID = employee.ID
            AND REPLACE(LOWER(employee.ID), ' ', '') LIKE '%{$search}%'
            ORDER BY employee.start_date DESC;";
    $result = mysqli_query($con, $sql);
}

if (mysqli_num_rows($result) > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Nhân viên</th>
                    <th>ID</th>
                    <th>Ngày vào làm</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick=\"redirectToDetailsPage('".$row['ID']."')\">
                <td>".$i."</td>
                <td>".$row['Employee Name']."</td>
                <td>".$row['ID']."</td>
                <td>".$row['start_date']."</td>
                <td><a href=\"database_scripts/confirmation_2.php?id={$row['ID']}\">Xóa</a></td>
            </tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No results found";
}

mysqli_close($con);
?>