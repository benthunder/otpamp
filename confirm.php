<?php
require_once './config.php';
require_once './TCSotpAPI.php';

$config = new Config();
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
    $customer = $config->getConnection()->query("SELECT * FROM customer_otp WHERE phone = '$phone' LIMIT 1");


    if ($customer->num_rows < 1) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = false;

        throw new Exception('Không đúng Số điện thoại');
    }

    $customer = $config->getConnection()->query("SELECT * FROM customer_otp WHERE phone = '$phone' AND active = 1 LIMIT 1");
    if ($customer->num_rows > 0) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = false;

        // throw new Exception('Số điện thoại đã được xác nhận');

        return $response;
    }

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

    $db = $config->getConnection();
    $query = "UPDATE customer_otp SET active=1 WHERE phone = '$phone' AND otp_code = '$code'";

    $checkStatement =  $config->getConnection()->query($query);
    if (!$checkStatement) {
        throw new Exception(
            'Không thể xác nhận'
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
