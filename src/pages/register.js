import '../styles/register.css';
import Header from '../components/header2';
import React, { useState } from 'react';

function Register() {
    const [fullName, setFullName] = useState('');
    const [phoneNumber, setPhoneNumber] = useState('');
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [confirmPassword, setConfirmPassword] = useState('');
    const [address, setAddress] = useState('');
    const [agreeTerms, setAgreeTerms] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();

        // Kiểm tra các trường thông tin
        if (password !== confirmPassword) {
            console.log("Mật khẩu không khớp. Vui lòng thử lại.");
            return;
        }

        if (!agreeTerms) {
            console.log("Bạn phải đồng ý với các điều khoản sử dụng để tiếp tục đăng ký.");
            return;
        }

        // Tiếp tục xử lý đăng ký
        // ...
    };

    return (
        <div className="main">
            <Header />
            <div class="dangky">
                <span class="chudangky">Đăng ký</span>
                <div class="thongtin">

                    <form onSubmit={handleSubmit}>
                        <div class = "components">
                            <span>Họ và Tên *</span>
                            <input
                                type="text"
                                placeholder="Họ và tên"
                                value={fullName}
                                onChange={(e) => setFullName(e.target.value)}
                            />
                        </div>

                        <div class = "components">
                            <span>Số điện thoại / Email *</span>
                            <input
                                type="tel"
                                placeholder="Số điện thoại"
                                value={phoneNumber}
                                onChange={(e) => setPhoneNumber(e.target.value)}
                            />
                        </div>

                        <div class = "components">
                            <span>Tên đăng nhập *</span>
                            <input
                                type="text"
                                placeholder="Tên đăng nhập"
                                value={username}
                                onChange={(e) => setUsername(e.target.value)}
                            />
                        </div>

                        <div class = "components">
                            <span>Mật khẩu *</span>
                            <input
                                type="password"
                                placeholder="Mật khẩu"
                                value={password}
                                onChange={(e) => setPassword(e.target.value)}
                            />
                        </div>

                        <div class = "components">
                            <span>Nhập lại mật khẩu *</span>
                            <input
                                type="password"
                                placeholder="Nhập lại mật khẩu"
                                value={confirmPassword}
                                onChange={(e) => setConfirmPassword(e.target.value)}
                            />
                        </div>

                        <div class = "components">
                            <span>Địa chỉ *</span>
                            <input
                                type="text"
                                placeholder="Địa chỉ"
                                value={address}
                                onChange={(e) => setAddress(e.target.value)}
                            />
                        </div>

                        <div class = "components checkbox">
                            <label>
                                <div class = "checkbox">
                                <input
                                    type="checkbox"
                                    checked={agreeTerms}
                                    onChange={(e) => setAgreeTerms(e.target.checked)}
                                />
                                <p>Tôi đã đọc và đồng ý với các <a href = "">điều khoản sử dụng</a></p>
                                </div>
                                
                            </label>
                        </div>
                        <div class = "nutdangky">
                            <button type="submit">Đăng ký</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    );
}

export default Register;