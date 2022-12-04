<?php

require_once './config.php';
require_once './SpeedSMSAPI.php';

$config = new Config();
$otpClient = new SpeedSMSAPI("Token");


try {
    $response = [];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

    if (!$phone) {
        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }
    $response['phone'] = $phone;

    // Check OTP time

    $liveTimeSec = 300;
    $customer = $config->getConnection()->query("SELECT * , TIME_TO_SEC(TIMEDIFF(NOW(), created_at)) AS min_diff FROM customer_otp WHERE phone = '$phone'");

    if ($customer->num_rows < 1) {
        $response['is_hide_reset'] = false;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = true;

        throw new Exception('Số điện thoại không tồn tại');
    }


    $rows = $customer->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as $row) {
        if ($row['min_diff'] < $liveTimeSec) {
            $response['is_hide_reset'] = false;
            $response['is_hide_main_form'] = true;
            $response['is_hide_confirm'] = true;

            $liveTimeMin = round($liveTimeSec / 60);
            throw new Exception("Nhận lại quá nhiều lần xin quay lại sau $liveTimeMin ");
        }
    }

    // $code = generateRandomString(6);
    // $otpResponse = $otpClient->sendSMS([$phone], $code, SpeedSMSAPI::SMS_TYPE_CSKH, "");
    // if (!is_array($otpClient)) {
    //     throw new Exception(
    //         'Không thể gửi OTP'
    //     );
    // }
    $code = generateRandomString(6);
    $db = $config->getConnection();
    $query = "UPDATE customer_otp SET otp_code = '$code' WHERE phone='$phone'";

    $checkStatement =  $config->getConnection()->query($query);
    if (!$checkStatement) {
        throw new Exception(
            'Không thể gửi OTP'
        );
    }

    $response['is_hide_reset'] = true;
    $response['is_hide_main_form'] = true;
    $response['is_hide_confirm'] = false;

    return $response;
} catch (Exception $e) {
    header("HTTP/1.1 400 Bad Request");
    $response['verifyErrors']['message'] = $e->getMessage();
} finally {
    echo json_encode($response);
    exit();
}

function generateRandomString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
