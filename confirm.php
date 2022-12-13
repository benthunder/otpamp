<?php
require_once './TCSotpAPI.php';
$otpClient = new TCSotpAPI();

try {
    $response = [];
    $code = isset($_POST['otp-confirm-code']) ? strtoupper($_POST['otp-confirm-code']) : false;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

    if (!$phone || !$code) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = false;
        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }

    $response['phone'] = $phone;

    $otpClient->verifyToken($phone, $code);

    $otpResponse = $otpClient->sendSMS($phone);
    if (!is_array($otpClient)) {
        throw new Exception(
            'OTP không đúng'
        );
    }

    if ($otpClient['messageCode'] != 1) {
        throw new Exception(
            'OTP không đúng'
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
