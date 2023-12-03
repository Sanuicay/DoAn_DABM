<?php
$id = $_GET['id'];

echo "<script>
    var confirmation = confirm('Are you sure you want to delete this book?');
    if (confirmation) {
        window.location.href = 'delete_book_data_from_ID.php?id={$id}';
    } else {
        window.location.href = '../list_of_book.php';
    }
</script>";

?>
