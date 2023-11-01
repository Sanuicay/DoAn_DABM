<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<title>My website</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #F9F1E7;
			display: flex;
			flex-direction: column;
			align-items: center;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            width: 100%;
        }
        .header-left-section {
            display: flex;
            align-items: center;
            width: 30%;
            justify-content: flex-start;
        }
        .header-right-section {
            display: flex;
            align-items: center;
            width: 30%;
            justify-content: flex-end;
        }
        .header-logo {
            height: 35px;
            margin-left: 60px;
        }
        .header-nav-links {
            display: flex;
            gap: 15px;
            justify-content: center;
            font-family: Arial, sans-serif;
            font-weight: 550;
        }
        .header-nav-links a, .header-right-section a, .header-left-section a{
            text-decoration: none;
            color: black;
            margin-left: 10px;
            margin-right: 10px;
        }
        .header-icon {
            width: 20px; 
            height: 20px; 
            margin-right: 30px;
        }
        login_button {
            padding: 10px 20px; 
            background-color: #C98E5B;
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 13px; 
            margin-right: 20px;
        }
        login_button:hover {
            /*a little bit darker than #C98E5B*/
            background-color: #B37D4E; 
        }

        .email_signup_button {
            padding: 10px 20px; 
            background-color: #ffffff;
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 15px; 
            margin-right: 0px;
        }
        .email_signup_button:hover {
            /*a little bit darker than #ffffff*/
            background-color: #e6e6e6; 
        }


        .slider_section .slider_container {
        color: #fefefe;
        background-color: #000000;
        background-color: #f89cab;
        padding: 25px;
        border-radius: 0 0 15px 15px;
        }

        .slider_section .row {
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        }

        .slider_section .img-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
            -ms-flex-pack: center;
                justify-content: center;
        padding: 45px;
        }

        .slider_section .img-box img {
        width: 275px;
        }

        .slider_section .detail-box {
        padding-left: 45px;
        margin: 45px 0;
        }

        .slider_section .detail-box h1 {
        font-weight: bold;
        font-size: 3.5rem;
        margin-bottom: 10px;
        }

        .slider_section .detail-box a {
        display: inline-block;
        padding: 10px 40px;
        background-color: #db4566;
        color: #ffffff;
        border: 1px solid #db4566;
        border-radius: 5px;
        -webkit-transition: all .3s;
        transition: all .3s;
        margin-top: 25px;
        text-transform: uppercase;
        }

        .slider_section .detail-box a:hover {
        background-color: transparent;
        color: #db4566;
        }

        .slider_section .carousel_btn-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        background-color: #ffffff;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        position: absolute;
        bottom: -25px;
        left: 5%;
        padding: 7px 10px;
        border-radius: 5px 5px 0 0;
        }

        .slider_section .carousel_btn-box img {
        margin: 0 10px;
        }

        .slider_section .carousel_btn-box .carousel-control-prev,
        .slider_section .carousel_btn-box .carousel-control-next {
        position: unset;
        height: 25px;
        width: 25px;
        background-repeat: no-repeat;
        opacity: 1;
        background-position: center;
        color: #000000;
        font-size: 14px;
        }

        /* .footer */
        .footer {
            padding:50px 0;
            color:#000000;
            background-color:#FFFFFF;
            width: 100%;
        }

        .footer h3 {
            margin-top:0px;
            margin-bottom:13px;
            font-weight:bold;
            font-size:16px;
        }

        .footer ul {
            padding:0;
            list-style:none;
            line-height:1.6;
            font-size:14px;
            margin-bottom:0;
        }

        .footer ul a {
            color:inherit;
            text-decoration:none;
            opacity:0.6;
        }

        .footer ul a:hover {
            opacity:0.8;
        }

        .footer .copyright {
            text-align:left;
            opacity:1;
            font-size:13px;
            margin-bottom:0;
        }
        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        .form-control.shadow-0:focus {
            box-shadow: none;
        }
        </style>
</head>
<body>
    <div class="header">
        <div class="header-left-section">
            <a href="index.php"><img class="header-logo" src="img/logo_DABM.png" alt="Logo"></a>
        </div>
        <div class="header-nav-links">
            <a href="#">Trang chủ</a>
            <a href="#">Cửa hàng</a>
            <a href="#">Giới thiệu</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="header-right-section">
            <a href="#"><img class="header-icon" src="img/icon1.png" alt="Icon 1"></a>
            <a href="#"><img class="header-icon" src="img/icon1.png" alt="Icon 2"></a>
            <a href="#"><img class="header-icon" src="img/icon1.png" alt="Icon 3"></a>
            <login_button>Đăng nhập</login_button>
        </div>
    </div>
    <!-- start slider section -->
    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                    <div class="img-box">
                      <img src="img/dehya.gif" alt="" />
                    </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                    <div class="img-box">
                      <img src="img/dehya.gif" alt="" />
                    </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                    <div class="img-box">
                      <img src="img/dehya.gif" alt="" />
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <img src="images/line.png" alt="" />
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
        <div class="footer">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 item">
                            <h3>LIÊN KẾT</h3>
                            <ul>
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Cửa hàng</a></li>
                                <li><a href="#">Giới thiệu về DABM</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-4 item">
                            <h3>VỀ DABM</h3>
                            <ul>
                                <li><a href="#">Điều khoản</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-4 item">
                            <h3>NHẬN THÔNG BÁO QUA EMAIL</h3>
                            <ul>
                                <div class="p-1 rounded border">
                                    <div class="input-group">
                                        <input type="email" placeholder="Nhập email của bạn" class="form-control border-0 shadow-0">
                                        <div class="input-group-append">
                                            <a class="email_signup_button" href="index.php">Đăng ký</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>