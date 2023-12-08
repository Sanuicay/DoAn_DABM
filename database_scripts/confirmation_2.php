<?php
$id = $_GET['id'];

echo "<script>
    var confirmation = confirm('XÁC NHẬN XÓA NHÂN VIÊN?');
    if (confirmation) {
        window.location.href = 'delete_employee_data_from_ID.php?id={$id}';
    } else {
        window.location.href = '../manager_employee.php';
    }
</script>";

?>
