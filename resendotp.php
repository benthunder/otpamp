<?php

require_once './config.php';
require_once './TCSotpAPI.php';

$config = new Config();
$otpClient = new TCSotpAPI();

try {
    $response = [];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

    if (!$phone) {
        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }
    $response['phone'] = $phone;

    $otpResponse = $otpClient->sendSMS($phone);
    if (!is_array($otpClient)) {
        throw new Exception(
            'Không thể gửi OTP'
        );
    }

    if ($otpClient['messageCode'] != 1) {
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

