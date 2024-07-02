<?php
require_once '../../Controllers/Connections.php';
require_once '../../Controllers/Sessions.php';
require_once '../../Controllers/Configs.php';

$Username = '';
$Password = '';
$RePassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = htmlspecialchars(trim($_POST["username"]));
    $Password = htmlspecialchars(trim($_POST["password"]));
    $RePassword = htmlspecialchars(trim($_POST["RePassword"]));

    if ($_AuthLog == 1) {
        echo json_encode([
            'success' => false,
            'message' => 'Đang bảo trì đăng nhập, vui lòng thử lại sau!'
        ]);
        exit();
    }

    if (!isValidInput($Username) || !isValidInput($Password)) {
        echo json_encode([
            'success' => false,
            'message' => 'Tên đăng nhập và mật khẩu không được chứa kí tự đặc biệt.'
        ]);
        exit();
    }

    if ($Password !== $RePassword) {
        echo json_encode([
            'success' => false,
            'message' => 'Mật khẩu nhập lại không khớp!'
        ]);
        exit();
    }

    if (checkExistingUsername($conn, $Username)) {
        echo json_encode([
            'success' => false,
            'message' => 'Tài khoản đã tồn tại.'
        ]);
        exit();
    }

    if (insertAccount($conn, $Username, $Password)) {
        echo json_encode([
            'success' => true,
            'message' => 'Đăng ký thành công!!'
        ]);
        exit();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Đăng ký thất bại.'
        ]);
        exit();
    }
}
?>
