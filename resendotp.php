<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

require_once './TCSotpAPI.php';
$otpClient = new TCSotpAPI();

try {
    $response = [];
    $phone = isset($_POST['cellphone']) ? $_POST['cellphone'] : false;
    
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

