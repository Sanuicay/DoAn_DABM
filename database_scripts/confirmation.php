<?php
include_once("../connection.php");

$id = $_GET['id'];

// Extract the part before the first colon ':'
//$idParts = explode(':', $id);
//$id = $idParts[0];

// Fetch the book name and remaining_quantity from the database
$query = "SELECT book_name, remaining_quantity FROM book WHERE book_ID = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $bookName = $row['book_name'];
    $remainingQuantity = $row['remaining_quantity'];

    echo "<script>
            console.log('Book ID:', '{$id}');
            if ({$remainingQuantity} > 0) {
                var confirmation = confirm('Còn {$remainingQuantity} quyển sách. XÁC NHẬN XÓA SÁCH?');
                if (confirmation) {
                    window.location.href = 'delete_book_data_from_ID.php?id={$id}';
                } else {
                    window.location.href = '../list_of_book.php';
                }
            } else {
                var confirmation = confirm('XÁC NHẬN XÓA SÁCH?');
                if (confirmation) {
                    window.location.href = 'delete_book_data_from_ID.php?id={$id}';
                } else {
                    window.location.href = '../list_of_book.php';
                }
            }
          </script>";
} else {
    // Handle error if the query fails
    echo "Error fetching book data.";
}

mysqli_close($con);
?>
