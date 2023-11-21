<?php
// Connect to your database
$con = mysqli_connect("localhost:3307","root","","doan");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Get the ID from the GET request
$id = $_GET['id'];

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
    <link rel="stylesheet" href="css/single_product.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
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
    <div class="content">
        <script>
            function increment() {
                var input = document.getElementById('quantity');
                input.value = parseInt(input.value) + 1;
            }

            function decrement() {
                var input = document.getElementById('quantity');
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        </script>
        <div class="image-box">
            <img src="img/pic1.png" alt="Image 1"><br>
            <img src="img/pic2.png" alt="Image 2"><br>
            <img src="img/pic3.png" alt="Image 3"><br>
            <img src="img/pic4.png" alt="Image 4"><br>
        </div>
        <img src="img/pic1.png" alt="Large Image" class="large-image">
        <main>
            <?php
            $query = "SELECT book.book_name, written_by.author_name, publisher.publisher_name, book.publication_year, book.release_date, book.book_ID, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.display_status 
                      FROM book, written_by, publisher, belongs_to, genre 
                      WHERE book.book_ID = written_by.book_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND book.book_ID = $id"; 
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc() && $row["display_status"] == "Available") {
                  echo "<h1>" . $row["book_name"]. "</h1>";
                  echo "<p>Tác giả: " . $row["author_name"]. "</p>";
                  echo "<p>Nhà xuất bản: " . $row["publisher_name"]. "</p>";
                  echo "<p>Năm xuất bản: " . $row["publication_year"]. "</p>";
                  echo "<p>Năm phát hành: " . $row["release_date"]. "</p>";
                  echo "<p>Mã sách: " . $row["book_ID"]. "</p>";
                  echo "<p>Thể loại: " . $row["genre_name"]. "</p>";
                  echo "<p>Số trang: " . $row["page_count"]. "</p><br>";
                  echo "<p class='price'>" . $row["sale_price"]. " VND</p><br>";
                    echo "<div class='quantity-group'>";
                        echo "<button onclick='decrement()'>-</button>";
                        echo "<input id='quantity' type='text' value='1'>";
                        echo "<button onclick='increment()'>+</button>";
                        echo "<span class='stock'>Kho: " . $row["remaining_quantity"]. "</span>";
                    echo "</div><br>";
                }
              } else {
                echo "0 results";
              }
            ?>
            <a href="#"><button>Thêm vào giỏ hàng</button></a>
            <a href="#"><button>Mua ngay</button></a>
        </main>
    </div>
    <div class="product-description">
        <h2>Mô tả sản phẩm:</h2>
        <h1>Thông tin sản phẩm:</h1>
        <a>- Tác giả: Nhiều tác giả</a>
        <a>- Số trang: 176</a>
        <a>- Năm xuất bản: 2022</a>
        <a>- Khổ sách: 19 x 26.5 cm</a>
        <a>- Hình thức: Bìa mềm</a>
        <a>- Nhà xuất bản: NXB Giáo dục Việt Nam</a>
        <a>- Đổi mới</a>
        <a>+ Cung cấp thông tin và tra cứu thông tin khoa học cốt lõi</a>
        <a>+ Định hướng các hoạt động dạy học</a>
        <a>+ Tạo động cơ học tập xen kẽ chặt chẽ, kịp thời giữa lý thuyết và thực hành</a>
        <a>+ Tạo điều kiện dạy học tích cực, tích hợp và dạy học phân hóa học sinh</a>
        <a>+ Hỗ trợ tự học, vận dụng các kiến thức, kĩ năng đã học vào thực tiễn</a>
        <a>Lưu ý khi mua hàng</a>
        <a>- Quý khách cần tư vấn sách phù hợp nhu cầu và mong muốn, vui lòng chat với shop để được hỗ trợ tốt nhất</a>
        <a>- Sản phẩm đổi trả trong 3 ngày kể từ khi đơn hàng được giao thành công. Áp dụng với hàng còn mới, chưa qua sử dụng, bị lỗi hoặc hư hỏng do vận chuyển hoặc do nhà sản xuất</a>
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