<?php
require_once './config.php';
require_once './TCSotpAPI.php';


$config = new Config();
$otpClient = new TCSotpAPI();

try {
    $response = [];

    $city = isset($_POST['city']) ? $_POST['city'] : false;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : false;

    if (!$phone || !$city) {

        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = false;
        $response['is_hide_confirm'] = true;

        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }

    $response['phone'] = $phone;
    $otpResponse = $otpClient->sendSMS($phoneEnc);

    if (!is_array($otpResponse)) {
        throw new Exception(
            'Không thể gửi OTP'
        );
    }

    if ($otpResponse['messageCode'] != 1) {
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
