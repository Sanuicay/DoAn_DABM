<?php
// Get user ID
session_start();
//check if user is logged in
if(!isset($_SESSION['user_id'])){
    $user_id = -1;
}
else{
    $con = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE ID = {$_SESSION["user_id"]}";
            
    $user = $con->query($sql)->fetch_assoc();
    $user_id = $user["ID"];
}

// Connect to your database
$con = mysqli_connect("localhost:3307","root","","dabm_database");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Get the ID from the GET request, ID can be "1" or "D001"
$book_id = $_GET['id'];
//sanitize the id before using in the query
$book_id = mysqli_real_escape_string($con, $book_id);

$query = "SELECT book.book_name, author.author_name, publisher.publisher_name, book.publication_year, book.release_date, book.book_ID, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.display_status, book.img_path
          FROM book, author, publisher, genre, written_by, belongs_to
          WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID AND book.book_ID = '$book_id';";
$result = mysqli_query($con,$query);


//When click on the button "Thêm vào giỏ hàng", if the user is not logged in, redirect to login page
// else add the book to the cart_include table
if(isset($_POST['add_to_cart'])){
    if($user_id == -1){
        header('location:login.html');
    }
    else{
        $quantity = $_POST['quantity'];
        //check quantity, if quantity is less than 1, alert and set quantity to 1
        if($quantity < 1){
            echo "<script>alert('Số lượng không hợp lệ!');</script>";
            $quantity = 1;
            echo "<script>window.location.href='single_product.php?id=$book_id';</script>";
        }
        else{
            // Check if the book is already in the cart
            $query = "SELECT * FROM cart_include WHERE ID = '$user_id' AND book_ID = '$book_id';";
            $result = mysqli_query($con,$query);
            if ($result->num_rows > 0) {
                // If the book is already in the cart, update the quantity then minus the remaining_quantity in book table
                $query = "UPDATE cart_include SET cart_quantity = cart_quantity + '$quantity' WHERE ID = '$user_id' AND book_ID = '$book_id';";
                $result = mysqli_query($con,$query);
                $query = "UPDATE book SET remaining_quantity = remaining_quantity - '$quantity' WHERE book_ID = '$book_id';";
                $result = mysqli_query($con,$query);
                // thông báo thêm vào giỏ hàng thành công
                if ($result) {
                    echo "<script>alert('Thêm vào giỏ hàng thành công!');</script>";
                    echo "<script>window.location.href='single_product.php?id=$book_id';</script>";
                } else {
                    echo "<script>alert('Thêm vào giỏ hàng thất bại!');</script>";
                    echo "<script>window.location.href='single_product.php?id=$book_id';</script>";
                }
            } else {
                // If the book is not in the cart, insert the book to the cart then minus the remaining_quantity in book table
                $query = "INSERT INTO cart_include VALUES ('$user_id', '$book_id', '$quantity');";
                $result = mysqli_query($con,$query);
                $query = "UPDATE book SET remaining_quantity = remaining_quantity - '$quantity' WHERE book_ID = '$book_id';";
                $result = mysqli_query($con,$query);
                if ($result) {
                    echo "<script>alert('Thêm vào giỏ hàng thành công!');</script>";
                    echo "<script>window.location.href='single_product.php?id=$book_id';</script>";
                } else {
                    echo "<script>alert('Thêm vào giỏ hàng thất bại!');</script>";
                    echo "<script>window.location.href='single_product.php?id=$book_id';</script>";
                }
            }
        }
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
            <a href="login_success.php">Trang chủ</a>
            <a href="features_product_nologin.php">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="user_member.php"><img class="header-icon" src="img/icon_user.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon_news.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon_heart.png" alt="Icon 3"></a>
            <a href="cart.php"><img class="header-icon" src="img/icon_cart.png" alt="Icon 3"></a>
        </div>
    </div>

    <!-- content goes here -->
    <div class="content">
        <div class="image-box">
            <img src="img/pic1.png" alt="Image 1"><br>
            <img src="img/pic2.png" alt="Image 2"><br>
            <img src="img/pic3.png" alt="Image 3"><br>
            <img src="img/pic4.png" alt="Image 4"><br>
        </div>
        <?php $row = $result->fetch_assoc() ?>
        <img src="<?php echo $row['img_path'] ?>" alt="Large Image" class="large-image">
        <main>
        <!-- SELECT book.book_name, author.author_name, publisher.publisher_name, book.publication_year, book.release_date, book.book_ID, genre.genre_name, book.page_count, book.sale_price, book.remaining_quantity, book.display_status
        FROM book, author, publisher, genre, written_by, belongs_to
        WHERE book.book_ID = written_by.book_ID AND written_by.author_ID = author.author_ID AND book.publisher_ID = publisher.publisher_ID AND book.book_ID = belongs_to.book_ID AND belongs_to.genre_ID = genre.genre_ID; -->
            <?php
            if ($result->num_rows > 0) {
                    echo "<h1>" . $row["book_name"]. "</h1>";
                    echo "<p>Tác giả: " . $row["author_name"]. "</p>";
                    echo "<p>Nhà xuất bản: " . $row["publisher_name"]. "</p>";
                    echo "<p>Năm xuất bản: " . $row["publication_year"]. "</p>";
                    echo "<p>Năm phát hành: " . $row["release_date"]. "</p>";
                    echo "<p>Mã sách: " . $row["book_ID"]. "</p>";
                    echo "<p>Thể loại: " . $row["genre_name"]. "</p>";
                    echo "<p>Số trang: " . $row["page_count"]. "</p><br>";
                    echo "<p class='price'>" . number_format($row["sale_price"], 0, ',', ' '). " VNĐ</p><br>";
                    echo "<div class='quantity-group'>";
                    echo "<input type='number' id='quantity' name='quantity' value='1' min='1' max='" . $row["remaining_quantity"]. "' oninput='updateQuantity()'>";
                    echo "<span class='stock'>Kho: " . $row["remaining_quantity"]. "</span>";
                echo "</div><br>";
        } else {
            echo "0 results";
        }
    ?>
    <form method="POST">
        <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
        <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
        <button type="submit" name="buy_now">Mua ngay</button>
    </form>
    
    <script>
        function updateQuantity() {
            var quantity = document.getElementById('quantity').value;
            document.getElementById('hiddenQuantity').value = quantity;
        }
    </script>
        </main>
    </div>
    <div class="product-description">
        <h2>Mô tả sản phẩm:</h2>
        <p>Thông tin sản phẩm:</p>
        <a>- Tác giả: Nhiều tác giả</a>
        <a>- Số trang: 176</a>
        <a>- Năm xuất bản: 2022</a>
        <a>- Khổ sách: 19 x 26.5 cm</a>
        <a>- Hình thức: Bìa mềm</a>
        <a>- Nhà xuất bản: NXB Giáo dục Việt Nam</a>
        <a>- Đổi mới</a>
        <div class="product-description-new">
            <a>+ Cung cấp thông tin và tra cứu thông tin khoa học cốt lõi</a>
            <a>+ Định hướng các hoạt động dạy học</a>
            <a>+ Tạo động cơ học tập xen kẽ chặt chẽ, kịp thời giữa lý thuyết và thực hành</a>
            <a>+ Tạo điều kiện dạy học tích cực, tích hợp và dạy học phân hóa học sinh</a>
            <a>+ Hỗ trợ tự học, vận dụng các kiến thức, kĩ năng đã học vào thực tiễn</a>
        </div>
        <p>Lưu ý khi mua hàng:</p>
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