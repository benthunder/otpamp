<?php
header('HTTP/1.1 200 OK');
header("access-control-allow-credentials:true");
header("AMP-Same-Origin: true");
header("Access-Control-Allow-Origin:" . $_SERVER['HTTP_ORIGIN']);
header("amp-access-control-allow-source-origin: https://" . $_SERVER['HTTP_HOST']);
header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
header("access-control-allow-headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");
header("access-control-allow-methods:POST, GET, OPTIONS");
header("Content-Type: application/json");

require_once './TCSotpAPI.php';
$otpClient = new TCSotpAPI();

try {
    $response = [];
    $code = isset($_POST['otp-confirm-code']) ? strtoupper($_POST['otp-confirm-code']) : false;
    $phone = isset($_POST['cellphone']) ? $_POST['cellphone'] : false;

    if (!$phone || !$code) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = false;
        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }

    $response['phone'] = $phone;

    $otpResponse = $otpClient->verifyToken($phone, $code);

    if (!is_array($otpResponse)) {
        throw new Exception(
            'OTP không đúng'
        );
    }


    if ($otpResponse['messageCode'] != 1) {

        if ($otpResponse['message'] == 'Số điện thoại đang gắn với nhiều tài khoản, vui lòng liên hệ hotline 19006622 để được hỗ trợ.') {
            $response['is_hide_reset'] = true;
            $response['is_hide_main_form'] = true;
            $response['is_hide_confirm'] = false;

            return $response;
        }

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
