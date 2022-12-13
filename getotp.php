<?php
require_once './TCSotpAPI.php';
$otpClient = new TCSotpAPI();

try {
    $response = [];
    $phone = isset($_POST['cellphone']) ? $_POST['cellphone'] : false;

    if (!$phone) {

        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = false;
        $response['is_hide_confirm'] = true;

        throw new Exception(
            'Thiếu dữ liệu , xin nhập lại'
        );
    }

    $response['phone'] = $phone;
    $otpResponse = $otpClient->sendSMS($phone);
    if (!is_array($otpResponse)) {
        throw new Exception(
            'Không thể gửi OTP'
        );
    }

    if ($otpResponse['messageCode'] != 1) {
        if($otpResponse['message'] == 'Số điện thoại đang gắn với nhiều tài khoản, vui lòng liên hệ hotline 19006622 để được hỗ trợ.'){
            $response['is_hide_reset'] = true;
            $response['is_hide_main_form'] = false;
            $response['is_hide_confirm'] = true;

            return $response;
        }

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
}
