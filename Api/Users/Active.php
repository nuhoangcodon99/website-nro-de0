<?php
include '../../Controllers/Connections.php';
include '../../Controllers/Sessions.php';
include '../../Controllers/Configs.php';

function activateAccount($status, $coins, $username, $conn)
{
    if ($status == '1') {
        return ['success' => false, 'message' => 'Tài khoản của bạn đã được kích hoạt!'];
    }

    if (!in_array($status, ['0', '-1'])) {
        return ['success' => false, 'message' => 'Trạng thái tài khoản không hợp lệ!'];
    }

    if ($coins < 20000) {
        $action = $status == '0' ? 'kích hoạt' : 'mở lại';
        return ['success' => false, 'message' => "Bạn không đủ 20.000 KCoin. Vui lòng nạp thêm tiền vào tài khoản để $action tài khoản!"];
    }

    $stmt = $conn->prepare('UPDATE account SET active = 1, vnd = vnd - 20000 WHERE username = :username AND active != 1');
    $stmt->bindValue(':username', $username);
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $action = $status == '-1' ? 'Mở khóa' : 'Kích hoạt';
        return ['success' => true, 'message' => "$action tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!"];
    } else {
        return ['success' => false, 'message' => 'Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!'];
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postData = json_decode(file_get_contents('php://input'), true);
    $response = activateAccount($postData['status'], $postData['coins'], $postData['username'], $conn);
    header('Content-Type: application/json');
    echo json_encode($response);
}