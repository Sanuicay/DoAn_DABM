import React, { useState } from "react";
import Header from "../components/header2";
import Footer from "../components/footer";
import "../styles/login.css";
function Login() {
    const [showPassword, setShowPassword] = useState(false);
    const [rememberMe, setRememberMe] = useState(false);

    const handleShowPassword = () => {
        setShowPassword(!showPassword);
    };

    const handleRememberMe = () => {
        setRememberMe(!rememberMe);
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        // Thực hiện xử lý đăng nhập
    };

    return (
        <div class="main">
            <Header />
            <div class="login">

                <div class="dangnhap">
                    <span>Đăng nhập</span>
                    <form onSubmit={handleSubmit}>
                        <div class="khung">
                            <div class="tendangnhap">
                                <label htmlFor="tendangnhap">Tên đăng nhập</label>
                                <input type="text" id="tendangnhap" name="tendangnhap" />
                            </div>
                            <div class="matkhau">
                                <label htmlFor="matkhau">Mật khẩu</label>
                                <div class="matkhau-input">
                                    <input
                                        type={showPassword ? "text" : "password"}
                                        id="matkhau"
                                        name="matkhau"
                                    />
                                    <button type="button" onClick={handleShowPassword}>
                                        Hiện
                                    </button>
                                </div>
                            </div>
                            <div class="checkbox-quenmk">
                                <div class="checkbox">
                                    <div>
                                        <input
                                            type="checkbox"
                                            id="rememberMe"
                                            name="rememberMe"
                                            checked={rememberMe}
                                            onChange={handleRememberMe}
                                        />
                                    </div>
                                    <div>
                                        <p>Ghi nhớ đăng nhập</p>
                                    </div>
                                    
                                </div>
                                <div class="quenmatkhau">
                                    <a href="#">Quên mật khẩu?</a>
                                </div>
                            </div>

                            <div class="button-container">
                                <button class = "buttonDangnhap" type="submit">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class = "register">
                <div>
                    <h1>Chưa có tài khoản DABM?</h1>
                </div>
                <div class = "buttondangky">
                    <a  href = '/register'>Đăng ký</a>
                </div>
            </div>
            {/* <Footer /> */}
        </div>
    );
}

export default Login;