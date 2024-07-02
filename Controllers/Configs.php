<?php
#Người Tạo: Nguyen Duc Kien - Ngoc Rong Universe

// Cài đặt biến
$_Logo = 'Header.png'; // Tên + đuôi của Logo
$_Domain = 'NguyenDucKien.Com';
$_Title = 'Ngọc Rồng Lậu';
$_Description = 'Website chính thức của ngọc rồng lậu';
$_Keyword = 'Nro, Nro Lậu, Ngọc Rồng, Ngọc Rồng Online, Chú Bé Rồng, Free Thỏi Vàng';
$_ForgotEmail = 'Email'; // Gmail Chạy Quên Mật Khẩu
$_ForgotPass = 'Password'; // Mật Khẩu Gmail Chạy Quên Mật Khẩu

// Tăng giá trị đổi
$_GiaTri = '1'; // Nạp x1 -> x2 -> x3 (Thẻ Cào)
$_GiaTriAtm = '1'; // Chuyển Khoản x1 -> x2 -> x3
$_ThoiVang = '1';

// Trạng thái hoạt động
$_TrangThai = '0'; // Hoạt Động = 1, Bảo Trì = 0 (Trạng Thái Nạp Tiền)
$_FixWeb = '0'; // Bảo Trì = 1, Không Bảo Trì = 0
$_AuthLog = '0'; // Bảo Trì = 1, Không Bảo Trì = 0

// Hỗ trợ
$_Fanpage = '';
$_Zalo = '';
$_ZaloX1 = '';
$_ZaloX2 = '';

// Downloads
$_Android = '/Downloads/HaiTacDragon.apk';
$_Iphone = '/Downloads/HaiTacDragon.ipa';
$_Windows = '/Downloads/HaiTacDragon.rar';
$_Java = '/Downloads/HaiTacDragon.jar';
$_JavaX1 = '/Downloads/HaiTacDragon.jar';
$_JavaX3 = '/Downloads/HaiTacDragon.jar';
$_JavaX5 = '/Downloads/HaiTacDragon.jar';
$_JavaX10 = '/Downloads/HaiTacDragon.jar';
$_JavaX20 = '/Downloads/HaiTacDragon.jar';

// Card
$Partner_Key = 'bcdaaee5475cec3c76a7800a3998a5f2';
$Partner_Id = '8038619561';
$_ApiCard = 'https://thesieure.com/'; // Link Đại Lý Thẻ

// ATM - Mbbank
$userloginmbbank_config = 'User'; // Tài khoản đăng nhập Mbbank
$passmbbank_config = 'Password'; // Mật khẩu đăng nhập Mbbank
$deviceIdCommon_goc_config = 'DeviceId'; // Thông số lấy được từ F12
$stkmbbank_config = 'ndkien444'; // Số tài khoản Mbbank
$mbbank_name = 'NGUYEN DUC KIEN'; // Tên Tài khoản Mbbank
$_mbbank = 'Ngân Hàng Quân Đội | Mbbank'; // Ngân hàng quân đội Mbbank
// $_Token = ($conn->query("SELECT token FROM cpanel")->fetchColumn()) ?? '';
// $query = $conn->query("SELECT token FROM cpanel")->fetchColumn();
// $_Token = isset($query) ? $query : '';

function CreateToken()
{
    return md5(uniqid(rand(), true));
}

#Check Ip Localhost
function isLocalhost()
{
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

if (strpos($_SERVER['REQUEST_URI'], '/Api/') === 0 && ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET')) {
    if (!isLocalhost()) {
        echo '<script>window.location.href = "/";</script>';
        exit;
    }
}
