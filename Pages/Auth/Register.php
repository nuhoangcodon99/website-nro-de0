<?php
include '../../Controllers/Header.php';
?>
<div class="container pb-5">
    <form class="form-signin" id="registerForm" method="post">
        <div class="card">
            <div class="card-body">
                <h1 class="h3 font-weight-normal text-center">Đăng ký</h1>
                <?php if (!empty($_ThongBao)) {
                    echo $_ThongBao;
                } ?>
                <div class="form-group mb-2">
                    <label>Tài khoản</label>
                    <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username" value=""
                        minlength="3">
                </div>
                <div class="form-group mb-2">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password"
                        minlength="3">
                </div>
                <div class="form-group mb-2">
                    <label>Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" required=""
                        name="RePassword" minlength="3">
                </div>
                <div class="form-group text-center">
                    <button id="Register" class="btn btn-info btn-block text-white" type="submit">Đăng ký</button>
                </div>
            </div>
        </div>
        <div class="text-center pt-2">
            Bạn đã có tài khoản <a href="/Auth/Login">Đăng nhập ngay</a>
        </div>
        <div class="text-center pt-2">
            <a class="btn btn-primary" href="/Auth/ForgotPassword">Lấy Lại Mật Khẩu</a>
        </div>
    </form>
    <style>
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: 0 auto;
        }
    </style>
</div>
<script>
    document.getElementById('registerForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('/Api/Register', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showCustomToast(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = "/Auth/Login"; // Redirect to login page after successful registration
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

<?php include '../../Controllers/Footer.php'; ?>