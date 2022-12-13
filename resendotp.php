<?php
header('HTTP/1.1 200 OK');
header("access-control-allow-credentials:true");
header("AMP-Same-Origin: true");
header("Access-Control-Allow-Origin:".$_SERVER['HTTP_ORIGIN']);
header("amp-access-control-allow-source-origin: https://".$_SERVER['HTTP_HOST']);
header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
header("access-control-allow-headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");
header("access-control-allow-methods:POST, GET, OPTIONS");
header("Content-Type: application/json");

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

