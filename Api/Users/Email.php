<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
include '../../Controllers/Connections.php';
include '../../Controllers/Configs.php';
include '../../Controllers/Sessions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents('php://input'), true);
    $email = filter_var($postData['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        echo json_encode(["success" => false, "message" => "Email không hợp lệ"]);
    } else {
        $accountExists = checkExistingEmail($conn, $email);
        if (!$accountExists) {
            echo json_encode(["success" => false, "message" => "Email không tồn tại trong hệ thống"]);
        } else {
            $verificationCode = mt_rand(100000, 999999);
            $_SESSION['verification_code'] = $verificationCode;
            $_SESSION['email'] = $email;
            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $_ForgotEmail;
                $mail->Password = $_ForgotPass;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom($_ForgotEmail, $_ServerName);
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = 'Quên Mật Khẩu [ Nguyen Duc Kien ]';
                $mail->Body = '
                    <html>
                    <head>
                        <title>Xác nhận mật khẩu mới</title>
                    </head>
                    <body style="font-family: Arial, sans-serif;">
                        <p>Kính gửi quý khách hàng,</p>
                        <span>Dưới đây là mã xác minh mới của bạn: </span><b>' . $verificationCode . '</b>
                        <p>Vui lòng không tiết lộ mã này cho bất kỳ ai khác!</p>
                        <p>Xin cảm ơn bạn đã tin dùng dịch vụ của chúng tôi.</p>
                        <span>Trân trọng, <b>Nguyễn Đức Kiên</b></span>
                    </body>
                    </html>
                ';

                $mail->send();
                $query = "UPDATE account SET password = :verificationCode WHERE email = :email";
                $statement = $conn->prepare($query);
                $statement->bindParam(':verificationCode', $verificationCode, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->execute();
                echo json_encode(["success" => true, "message" => "Đã gửi mật khẩu mới về Email: " . $email]);
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => "Có lỗi xảy ra khi gửi email. Vui lòng thử lại sau."]);
            }
        }
    }
}