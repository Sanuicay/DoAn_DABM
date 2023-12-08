<?php
$id = $_GET['id'];

echo "<script>
    var confirmation = confirm('XÁC NHẬN XÓA SÁCH?');
    if (confirmation) {
        window.location.href = 'delete_book_data_from_ID.php?id={$id}';
    } else {
        window.location.href = '../list_of_book.php';
    }
</script>";

?>
