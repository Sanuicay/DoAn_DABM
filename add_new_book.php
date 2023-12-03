<?php
include("connection.php");

  if(isset($_POST['confirm'])){
    $tensach = $_POST['tensach'];
    $nhaxuatbanID = $_POST['nhaxuatbanID'];
    $masach = $_POST['masach'];
    $sotrang = $_POST['sotrang'];
    $ngayphathanh = $_POST['ngayphathanh'];
    $tentacgiaID = $_POST['tentacgiaID'];
    $namxuatban = $_POST['namxuatban'];
    $theloaiID = $_POST['theloaiID'];
    $soluong = $_POST['soluong'];
    $giatien = $_POST['giatien'];

    //check null

    if ($tensach == "" || $nhaxuatbanID == "" || $masach == "" || $sotrang == "" || $ngayphathanh == "" || $tentacgiaID == "" || $namxuatban == "" || $theloaiID == "" || $soluong == "" || $giatien == "")
    {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
    }
    else
    {
        $query1 = "INSERT INTO `book` (`book_ID`, `book_name`, `publisher_ID`, `publication_year`, `release_date`, `page_count`, `sale_price`, `remaining_quantity`) VALUES ('$masach', '$tensach', '$nhaxuatbanID', '$namxuatban', '$ngayphathanh', '$sotrang', '$giatien', '$soluong')";
        $query2 = "INSERT INTO `written_by` VALUES ('$masach', '$tentacgiaID')";
        $query3 = "INSERT INTO `belongs_to` VALUES ('$masach', '$theloaiID')";
        $result = mysqli_query($con,$query1);
        $result2 = mysqli_query($con,$query2);
        $result3 = mysqli_query($con,$query3);
        //redirect to list_of_book.php
        header('location:list_of_book.php');    
    }
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
        <p class="box-text">Nhập hàng mới</p>
        <div>
            <a href="#">Cá nhân</a>
            <a href="#">> Quản lý sách</a>
            <a href="#">> Nhập hàng mới</a>
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
            <a href="#"><img class="side-box-button" src="img/button_book_logistics.png" alt="Button1"></a>
        </div>
        <div class="body-container">
            <div class="profile">
                <h2>Thông tin sách</h2>
                <form method="POST">
                    <div class="name">
                        <div>
                            <!-- <label for="tensach">Tên sách</label><br>
                            <input type="text" id="tensach" name="tensach"><br>
                            <label for="nhaxuatbanID">Mã nhà xuất bản</label><br>
                            <input type="text" id="nhaxuatbanID" name="nhaxuatbanID"><br>
                            <label for="masach">Mã sách</label><br>
                            <input type="text" id="masach" name="masach"><br>
                            <label for="sotrang">Số trang</label><br>
                            <input type="text" id="sotrang" name="sotrang"><br>
                            <label for="ngayphathanh">Ngày phát hành</label><br>
                            <input type="text" id="ngayphathanh" name="ngayphathanh">
                        </div>
                        <div>
                            <label for="tentacgia">Mã tác giả</label><br>
                            <input type="text" id="tentacgiaID" name="tentacgiaID"><br>
                            <label for="namxuatban">Năm xuất bản</label><br>
                            <input type="text" id="namxuatban" name="namxuatban"><br>
                            <label for="theloai">Mã thể loại</label><br>
                            <input type="text" id="theloaiID" name="theloaiID"><br>
                            <label for="soluong">Số lượng</label><br>
                            <input type="text" id="soluong" name="soluong"><br>
                            <label for="giatien">Giá tiền</label><br>
                            <input type="text" id="giatien" name="giatien"> -->


                            <!-- tensach -->
                            <label for='tensach'>Tên sách</label><br>
                            <input type='text' id='tensach' name='tensach'><br>

                            <!-- nhaxuatbanID -->
                            <label for='nhaxuatban'>Mã nhà xuất bản</label><br>
                            <select id='nhaxuatbanID' name='nhaxuatbanID'>
                            <?php
                            $query = "SELECT publisher_ID, publisher_name
                                      FROM publisher;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['publisher_ID']}'>{$row['publisher_ID']} ({$row['publisher_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>

                            <!-- masach -->                   
                            <?php
                            //masach will be the highest number in book_ID + 1 and cannot be changed
                            $query = "SELECT MAX(book_ID) AS max_book_ID
                                      FROM book;";
                            $result = mysqli_query($con,$query);
                            $row = mysqli_fetch_assoc($result);
                            $masach = $row['max_book_ID'] + 1;
                            echo "<label for='masach'>Mã sách</label><br>";
                            echo "<input type='text' id='masach' name='masach' value='$masach' readonly><br>";
                            ?>

                            <!-- sotrang -->
                            <label for='sotrang'>Số trang</label><br>
                            <input type='number' id='sotrang' name='sotrang'><br>

                            <!-- ngayphathanh -->
                            <label for='ngayphathanh'>Ngày phát hành</label><br>
                            <input type='date' id='ngayphathanh' name='ngayphathanh'><br>

                            </div>
                        <div>
                            <!-- tentacgiaID -->
                            <label for='tentacgia'>Mã tác giả</label><br>
                            <select id='tentacgiaID' name='tentacgiaID'>
                            <?php
                            $query = "SELECT author_ID, author_name
                                      FROM author;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['author_ID']}'>{$row['author_ID']} ({$row['author_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>
                            
                            <!-- namxuatban -->
                            <label for='namxuatban'>Năm xuất bản</label><br>
                            <input type='number' id='namxuatban' name='namxuatban'><br>

                            <!-- theloaiID -->
                            <label for='theloai'>Mã thể loại</label><br>
                            <select id='theloaiID' name='theloaiID'>
                            <?php
                            $query = "SELECT genre_ID, genre_name
                                      FROM genre;";
                            $result = mysqli_query($con,$query);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='{$row['genre_ID']}'>{$row['genre_ID']} ({$row['genre_name']})</option>";
                            }
                            echo "</select><br>";
                            ?>

                            <!-- soluong -->
                            <label for='soluong'>Số lượng</label><br>
                            <input type='number' id='soluong' name='soluong'><br>

                            <!-- giatien -->
                            <label for='giatien'>Giá tiền</label><br>
                            <input type='number' id='giatien' name='giatien'><br>
                        </div>
                    </div>
                    <div class="description">
                        <label for="info">Mô tả thêm</label><br>
                        <input type="text" id="info" name="info">
                    </div>
                    <div class="button-container">
                        <input type="submit" name="confirm" value="XÁC NHẬN">
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