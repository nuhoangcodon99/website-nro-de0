<?php
require_once '../../Controllers/Connections.php';
require_once '../../Controllers/Sessions.php';
function isValidUsername($Username)
{
    return ctype_alnum($Username);
}

function loginUser($Username, $Password, $conn)
{
    global $_AuthLog;

    $response = [
        'success' => false,
        'message' => 'Có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!'
    ];

    try {
        if ($_AuthLog == 1) {
            $response['message'] = 'Đang bảo trì đăng nhập, vui lòng thử lại sau!';
            echo json_encode($response);
            return;
        }

        $stmt = $conn->prepare("SELECT * FROM account WHERE username = :Username");
        $stmt->bindParam(':Username', $Username, PDO::PARAM_STR);
        $stmt->execute();
        $select = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($select !== false && $select['password'] == $Password) {
            $_SESSION['account'] = htmlspecialchars($Username, ENT_QUOTES, 'UTF-8');
            $_SESSION['id'] = $select['id'];
            $response['success'] = true;
            $response['message'] = 'Đăng nhập thành công!';
        } else {
            $response['message'] = 'Tên đăng nhập hoặc mật khẩu không hợp lệ, vui lòng kiểm tra lại!';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại sau!';
    }

    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    $Password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

    if (!isValidUsername($Username)) {
        echo json_encode([
            'success' => false,
            'message' => 'Tên đăng nhập chỉ được chứa kí tự và số!'
        ]);
    } else {
        loginUser($Username, $Password, $conn);
    }
}
?>