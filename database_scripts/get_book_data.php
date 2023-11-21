<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$search = $_POST['search'];
$query = "SELECT book.book_ID, book.book_name, author.author_name, publisher.publisher_name, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity 
          FROM book, author, publisher, genre, written_by, belongs_to 
          WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND book.book_name LIKE '%$search%'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Found ".mysqli_num_rows($result)." results";
    echo "<table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã sách</th>
                    <th>Tên sách</th>
                    <th>Tác giả</th>
                    <th>NXB</th>
                    <th>Thể loại</th>
                    <th>Số trang</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr onclick=\"redirectToDetailsPage('".$row['book_ID']."')\">
                <td>".$i."</td>
                <td>".$row['book_ID']."</td>
                <td>".$row['book_name']."</td>
                <td>".$row['author_name']."</td>
                <td>".$row['publisher_name']."</td>
                <td>".$row['genre_name']."</td>
                <td>".$row['page_count']."</td>
                <td>".$row['sale_price']."</td>
                <td>".$row['remaining_quantity']."</td>
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