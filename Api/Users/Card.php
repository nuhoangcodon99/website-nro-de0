<?php
include '../../Controllers/Connections.php';
include '../../Controllers/Sessions.php';
include '../../Controllers/Configs.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postData = json_decode(file_get_contents('php://input'), true);
    $response = array();

    if ($_TrangThai == 1) {
        $response = array(
            'success' => false,
            'message' => 'Đang bảo trì nạp thẻ, vui lòng thử lại sau!'
        );
    } elseif (empty($postData['telco']) || empty($postData['amount']) || empty($postData['serial']) || empty($postData['code'])) {
        $response = array(
            'success' => false,
            'message' => 'Vui lòng nhập đầy đủ thông tin!'
        );
    } else {
        // $telco = $postData['telco'];
        // $serial = $postData['serial'];
        // $code = $postData['code'];
        // $amount = $postData['amount'];
        // $username = $postData['username'];
        // $request_id = rand(100000000, 999999999);
        // $dataPost = array(
        //     'request_id' => $request_id,
        //     'code' => $code,
        //     'partner_id' => $Partner_Id,
        //     'serial' => $serial,
        //     'telco' => $telco,
        //     'amount' => $amount,
        //     'command' => 'charging',
        //     'sign' => md5($Partner_Key . $code . $serial)
        // );


        $request_id = rand(100000000, 999999999);  //Mã đơn hàng của bạn
        $command = 'charging';  // Nap the
    
        $dataPost = array();
        $dataPost['request_id'] = $request_id;
        $dataPost['code'] = $postData['code'];
        $dataPost['partner_id'] = $Partner_Id;
        $dataPost['serial'] = $postData['serial'];
        $dataPost['telco'] = $postData['telco'];
        $dataPost['command'] = $command;
        ksort($dataPost);
        $sign = $Partner_Key;
        foreach ($dataPost as $item) {
            $sign .= $item;
        }
        
        $mysign = md5($sign);

        $dataPost['amount'] = $postData['amount'];
        $dataPost['sign'] = $mysign;

       
        $data = http_build_query($dataPost);
        
        $url = $_ApiCard . 'chargingws/v2?';
        $url .= $data;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        
        if ($result === false) {
            $response = array(
                'success' => false,
                'message' => 'Lỗi khi gửi yêu cầu nạp thẻ!'
            );
        } else {
            $obj = json_decode($result);

            if ($obj->status == 99) {
                $insert_query = "INSERT INTO napthe (request_id, user_nap, telco, serial, code, amount, status) VALUES (:request_id, :user_nap, :telco, :serial, :code, :amount, 99)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bindParam(':request_id', $request_id);
                $stmt->bindParam(':user_nap', $username);
                $stmt->bindParam(':telco', $telco);
                $stmt->bindParam(':serial', $serial);
                $stmt->bindParam(':code', $code);
                $stmt->bindParam(':amount', $amount);

                if ($stmt->execute()) {
                    $response = array(
                        'success' => true,
                        'message' => 'Nạp thành công, Vui lòng đợi máy chủ duyệt!'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Lỗi khi lưu dữ liệu vào máy chủ!'
                    );
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => $obj->message
                );
            }
        }
    }
    // Đảm bảo rằng dữ liệu được trả về là JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}