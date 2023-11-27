<?php
include("connection.php");
$bookID = $_GET['id'];
$query = "SELECT book.book_ID, book.book_name, written_by.author_ID, book.publisher_ID, belongs_to.genre_ID, book.publication_year, book.page_count, book.remaining_quantity, book.release_date, book.sale_price
          FROM book, written_by, belongs_to
          WHERE book.book_ID = written_by.book_ID AND book.book_ID = belongs_to.book_ID AND book.book_ID = '$bookID'";
$result = mysqli_query($con,$query);
$row_book = mysqli_fetch_assoc($result);

if(isset($_POST['confirm'])){
    if (!empty($_POST['tensach'])){
        $tensach = $_POST['tensach'];
        $query = "UPDATE `book` SET `book_name` = '$tensach' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['nhaxuatbanID'])){
        $nhaxuatbanID = $_POST['nhaxuatbanID'];
        $query = "UPDATE `book` SET `publisher_ID` = '$nhaxuatbanID' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['masach'])){
        $masach = $_POST['masach'];
        $query = "UPDATE `book` SET `book_ID` = '$masach' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['sotrang'])){
        $sotrang = $_POST['sotrang'];
        $query = "UPDATE `book` SET `page_count` = '$sotrang' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['ngayphathanh'])){
        $ngayphathanh = $_POST['ngayphathanh'];
        $query = "UPDATE `book` SET `release_date` = '$ngayphathanh' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['tentacgiaID'])){
        $tentacgiaID = $_POST['tentacgiaID'];
        $query = "UPDATE `written_by` SET `author_ID` = '$tentacgiaID' WHERE `written_by`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['namxuatban'])){
        $namxuatban = $_POST['namxuatban'];
        $query = "UPDATE `book` SET `publication_year` = '$namxuatban' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['theloaiID'])){
        $theloaiID = $_POST['theloaiID'];
        $query = "UPDATE `belongs_to` SET `genre_ID` = '$theloaiID' WHERE `belongs_to`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['soluong'])){
        $soluong = $_POST['soluong'];
        $query = "UPDATE `book` SET `remaining_quantity` = '$soluong' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    if (!empty($_POST['giatien'])){
        $giatien = $_POST['giatien'];
        $query = "UPDATE `book` SET `sale_price` = '$giatien' WHERE `book`.`book_ID` = '$bookID'";
        $result = mysqli_query($con,$query);
    }
    header("Location: list_of_book.php");
}
else if(isset($_POST['cancel'])){
    $tensach = "";
    $nhaxuatbanID = "";
    $masach = "";
    $sotrang = "";
    $ngayphathanh = "";
    $tentacgiaID = "";
    $namxuatban = "";
    $theloaiID = "";
    $soluong = "";
    $giatien = "";
    header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/add_new_book.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style_duong.css">
    <link rel="stylesheet" href="css/cover-box.css">

</head>
<body>
    <!-- header -->
    <div class="header">
        <div class="header-left-section">
            <a href="index.html"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="index.html">Trang chủ</a>
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user.html"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="#"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
        </div>
    </div>

    <!-- content goes here -->
    <div class="box"> <!--cover-box.css-->
        <img src="img/logo_DABM_3.png" alt="Home Icon" width="50px">
        <p class="box-text">Cập nhật thông tin sách</p>
        <div>
            <a href="index.html">Cá nhân</a>
            <a href="list_of_book.html">> Quản lý sách</a>
            <a>> Chi tiết sách</a>
        </div>
    </div>

    <div class="content">
        <div class="side-box">
            <a href="#"><img class="side-box-avatar" src="img/icon_user.png" alt="User Avatar"></a>
            <br>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F">Nguyễn Ngọc</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F">ID: 00000001</p>
            <p style="font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;">Employee</p> -->
            <?php
            echo "<p style='font-family: Times New Roman, Times, serif; font-size: 20px; font-weight: bold; margin-bottom: 0; color: #B88E2F'>{$row['sur_name']} {$row['last_name']}</p>";
            echo "<p style='font-family: Arial, sans-serif; font-size: 13px; margin-bottom: 0; color: #B88E2F'>ID: {$user['ID']}</p>";
            if ($id == 00000001)
            {
                echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Manager</p>";
            }
            else
            {
                //check if the ID exsist in the employee table
                $query_ = "SELECT ID
                          FROM employee
                          WHERE ID = $id;";
                $result_ = mysqli_query($con,$query_);
                $row_ = mysqli_fetch_assoc($result_);
                //check number of rows
                $count = mysqli_num_rows($result_);
                if ($count == 1)
                {
                    echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Employee</p>";
                }
                else
                {
                    echo "<p style='font-family: Arial, sans-serif; font-size: 13px; color: #B88E2F;'>Customer</p>";
                }
            }
            ?>
            <a href="#"><img class="side-box-button" src="img/button_personal_info.png" alt="Button1"></a>
            <a href="#"><img class="side-box-button" src="img/button_book_management.png" alt="Button1"></a>
            <a href="employee_order.html"><img class="side-box-button" src="img/button_check_receipt.png" alt="Button1"></a>
            <a href="#"><img class="side-box-last-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="body-container">
            <div class="profile">
                <h2>Thông tin sách</h2>
                <form method="POST">
                    <div class="name">
                        <div>
                            <?php
                            echo "<label for='tensach'>Tên sách</label><br>";
                            echo "<input type='text' id='tensach' placeholder='".$row_book['book_name']."' name='tensach'><br>";
                            echo "<label for='nhaxuatbanID'>Mã nhà xuất bản</label><br>";
                            echo "<input type='text' id='nhaxuatbanID' placeholder='".$row_book['publisher_ID']."' name='nhaxuatbanID'><br>";
                            echo "<label for='masach'>Mã sách</label><br>";
                            echo "<input type='text' id='masach' placeholder='".$row_book['book_ID']."' name='masach'><br>";
                            echo "<label for='sotrang'>Số trang</label><br>";
                            echo "<input type='text' id='sotrang' placeholder='".$row_book['page_count']."' name='sotrang'><br>";
                            echo "<label for='ngayphathanh'>Ngày phát hành</label><br>";
                            echo "<input type='text' id='ngayphathanh' placeholder='".$row_book['release_date']."' name='ngayphathanh'>";
                            ?>
                        </div>
                        <div>
                            <?php
                            echo "<label for='tentacgiaID'>Mã tác giả</label><br>";
                            echo "<input type='text' id='tentacgiaID' placeholder='".$row_book['author_ID']."' name='tentacgiaID'><br>";
                            echo "<label for='namxuatban'>Năm xuất bản</label><br>";
                            echo "<input type='text' id='namxuatban' placeholder='".$row_book['publication_year']."' name='namxuatban'><br>";
                            echo "<label for='theloaiID'>Mã thể loại</label><br>";
                            echo "<input type='text' id='theloaiID' placeholder='".$row_book['genre_ID']."' name='theloaiID'><br>";
                            echo "<label for='soluong'>Số lượng</label><br>";
                            echo "<input type='text' id='soluong' placeholder='".$row_book['remaining_quantity']."' name='soluong'><br>";
                            echo "<label for='giatien'>Giá tiền</label><br>";
                            echo "<input type='text' id='giatien' placeholder='".$row_book['sale_price']."' name='giatien'>";
                            ?>
                        </div>
                    </div>
                    <div class="description">
                        <label for="info">Mô tả thêm</label><br>
                        <input type="text" id="info" name="info">
                    </div>
                    <div class="button-container">
                        <input type="submit" name="confirm" value="CẬP NHẬT">
                        <input type="submit" name="cancel" value="HỦY">
                    </div>
                </form>
            </div>
            <div class="image">
                <div class="image-container">
                    +
                </div>
                <div class="upload-text">Thêm ảnh minh họa</div>
            </div>
        </div>
    </div>
    <!-- content goes here -->

    <div class="footer">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 item">
                        <h3><img class="footer-logo" src="img/logo_DABM_2.png" alt="Logo"></h3>
                        <ul>
                            <br>
                            <li>268 Lý Thường Kiệt, phường 14, quận</li>
                            <li>10, TP Hồ Chí Minh, Việt Nam</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2 item">
                        <h3>LIÊN KẾT</h3>
                        <ul>
                            <br>
                            <li><a href="#">Trang chủ</a></li>
                            <br>
                            <li><a href="#">Cửa hàng</a></li>
                            <br>
                            <li><a href="#">Giới thiệu về DABM</a></li>
                            <br>
                            <li><a href="#">Liên hệ</a></li>
                            <br>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-2 item">
                        <h3>VỀ DABM</h3>
                        <ul>
                            <br>
                            <li><a href="#">Điều khoản</a></li>
                            <br>
                            <li><a href="#">Thanh toán</a></li>
                            <br>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4 item">
                        <h3>NHẬN THÔNG BÁO QUA EMAIL</h3>
                        <ul>
                            <br>
                            <div class="p-1 rounded border">
                                <div class="input-group">
                                    <input type="email" placeholder="Nhập email của bạn" class="form-control border-0 shadow-0">
                                    <div class="input-group-append">
                                        <a class="email_signup_button" href="index.html">ĐĂNG KÝ</a>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <hr>
                <p>
                    <div style="display: flex; justify-content: space-between; opacity:1; font-size:13px; margin-bottom:0;">
                    <div style="text-align: left;">2023 DABM. Tất cả các quyền được bảo lưu</div>
                    <div style="text-align: right;">Quốc gia & Khu vực: Việt Nam</div>
                </div></p>
            </div>
        </footer>
    </div>  
</body>