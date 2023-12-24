<?php
// Connect to your database
// $con = mysqli_connect("localhost:3307","root","","doan");
$con = require_once __DIR__ . "/connect.php";

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

$query = "SELECT book.book_ID, book.book_name, author.author_name, publisher.publisher_name, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.deleted_tag 
          FROM book
          LEFT JOIN written_by ON book.book_ID = written_by.book_ID
          LEFT JOIN author ON written_by.author_ID = author.author_ID
          LEFT JOIN publisher ON book.publisher_ID = publisher.publisher_ID
          LEFT JOIN belongs_to ON book.book_ID = belongs_to.book_ID
          LEFT JOIN genre ON belongs_to.genre_ID = genre.genre_ID
          WHERE REPLACE(REPLACE(REPLACE(REPLACE(LOWER(book.book_name), ' ', ''), '(', ''), ')', ''), ';', '') LIKE '%$search%'
             OR book.book_ID LIKE '%$search%'
          ORDER BY book.deleted_tag";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
    // If no books found by name or ID, search by author name
    $query = "SELECT book.book_ID, book.book_name, author.author_name, publisher.publisher_name, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.deleted_tag 
              FROM book, author, publisher, genre, written_by, belongs_to 
              WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID 
                AND (REPLACE(REPLACE(REPLACE(REPLACE(LOWER(author.author_name), ' ', ''), '(', ''), ')', ''), ';', '') LIKE '%$search%'
                 OR book.book_ID LIKE '%$search%')";
    $result = mysqli_query($con, $query);
}

if (mysqli_num_rows($result) == 0) {
    // If no books found by author name or ID, search by publisher name
    $query = "SELECT book.book_ID, book.book_name, author.author_name, publisher.publisher_name, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.deleted_tag 
              FROM book, author, publisher, genre, written_by, belongs_to 
              WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID 
                AND (REPLACE(REPLACE(REPLACE(REPLACE(LOWER(publisher.publisher_name), ' ', ''), '(', ''), ')', ''), ';', '') LIKE '%$search%'
                 OR book.book_ID LIKE '%$search%')";
    $result = mysqli_query($con, $query);
}

if (mysqli_num_rows($result) == 0) {
    // If no books found by publisher name or ID, search by genre name
    $query = "SELECT book.book_ID, book.book_name, author.author_name, publisher.publisher_name, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.deleted_tag 
              FROM book, author, publisher, genre, written_by, belongs_to 
              WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID 
                AND (REPLACE(REPLACE(REPLACE(REPLACE(LOWER(genre.genre_name), ' ', ''), '(', ''), ')', ''), ';', '') LIKE '%$search%'
                 OR book.book_ID LIKE '%$search%')";
    $result = mysqli_query($con, $query);
}

if (mysqli_num_rows($result) > 0) {
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
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $idParts = explode(':', $row['book_ID']);
        $id = $idParts[0];
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
                <td>".($row['deleted_tag'] == 0 ? 'Đang bán' : 'Đã xóa')."</td>
                <td>".($row['deleted_tag'] == 0 ? "<a href=\"database_scripts/confirmation.php?id={$id}\">Xóa</a>" : "")."</td>
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
