<?php
include '../../Controllers/Header.php';
?>
<div class="container pb-5">
    <form class="form-signin" id="loginForm">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3 font-weight-normal text-center">Đăng nhập</h1>
                <div id="thongbao"></div>
                <div class="form-group mb-2">
                    <label class="sr-only">Tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username">
                </div>
                <div class="form-group mb-2">
                    <label class="sr-only">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" class="form-checkbox" name="remember" value="forever"> Nhớ đăng nhập
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-info btn-block text-white" type="submit" id="Login">Đăng nhập</button>
                </div>
                <div class="text-center pt-2">
                    Bạn chưa có tài khoản <a href="/Auth/Register">Đăng ký ngay</a>
                </div>
                <div class="text-center pt-2">
                    <a class="btn btn-primary" href="/Auth/ForgotPassword">Lấy Lại Mật Khẩu</a>
                </div>
            </div>
        </div>
    </form>
    <style>
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px 0;
            margin: 0 auto;
        }
    </style>
</div>
<script>
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('/Api/Login', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showCustomToast(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = "/";
                    }, 2000);
                } else {
                    showCustomToast(data.message, 'error');
                }
            })
            .catch(error => {
                showCustomToast('Có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!', 'error');
            });
    });
    function showCustomToast(message, type) {
        var toast = document.getElementById('customToast');
        toast.innerText = message;
        toast.style.display = 'block';
        toast.classList.remove('alert', 'alert-success', 'alert-danger'); // Xóa các lớp hiện có trước khi thêm lớp mới
        if (type === 'success') {
            toast.classList.add('alert', 'alert-success');
        } else {
            toast.classList.add('alert', 'alert-danger');
        }

        // Tự đóng thông báo sau 3 giây
        setTimeout(function () {
            toast.style.display = 'none';
        }, 3000);
    }
</script>
<?php 
curl_test();
include '../../Controllers/Footer.php'; 
?>