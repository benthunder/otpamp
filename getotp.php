<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    // Check OTP time

    $liveTimeSec = 300;
    $customer = $config->getConnection()->query("SELECT * FROM customer_otp WHERE phone = '$phone' LIMIT 1");

    if ($customer->num_rows > 0) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = true;
        $response['is_hide_confirm'] = false;

        return $response;
    }

    $customer = $config->getConnection()->query("SELECT * FROM customer_otp WHERE phone = '$phone' AND active = 1 LIMIT 1");
    if ($customer->num_rows > 0) {
        $response['is_hide_reset'] = true;
        $response['is_hide_main_form'] = false;
        $response['is_hide_confirm'] = true;

        throw new Exception('Số điện thoại đã được xác nhận');
    }

    $phoneEnc = generatePhoneCrypt($phone);
    $otpResponse = $otpClient->sendSMS($phoneEnc);

    if (!is_array($otpResponse)) {
        throw new Exception(
            'Không thể gửi OTP'
        );
    }

    $log = "";
    if ($otpResponse['messageCode'] != 1) {
        throw new Exception(
            'Không thể gửi OTP'
        );
        $log = $otpResponse['message'];
    }

    $db = $config->getConnection();
    $query = "INSERT INTO customer_otp(phone,city,otp_code,active) VALUES('$phone','$city','',0)";
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

function generatePhoneCrypt($phone) {
    $iv = "StG@2o2O";
    $key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDR0MWU0QxABmcymsMkJ4UUClnAhYA1mQfz0Gk2wb6MbajE6W4mEl3tN2LGlB5W+c8vH8HnO4mg61d9vurdW3LAoc8801Oeu8yBuGpplhSjNGvmBxPFXOQPVDjaSZ6k/RJme7bbzhc65e+GtWQh5PR58X35xBGYRG6JfPAWIZGKQIDAQAB";

    $encString = openssl_encrypt($phone, 'DES-CBC', $key, $options = 0, $iv);
    return $encString;
}

function decryptPhone($phoneEnc) {
    $iv = "StG@2o2O";
    $key = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDR0MWU0QxABmcymsMkJ4UUClnAhYA1mQfz0Gk2wb6MbajE6W4mEl3tN2LGlB5W+c8vH8HnO4mg61d9vurdW3LAoc8801Oeu8yBuGpplhSjNGvmBxPFXOQPVDjaSZ6k/RJme7bbzhc65e+GtWQh5PR58X35xBGYRG6JfPAWIZGKQIDAQAB";

    $encString = openssl_decrypt($phoneEnc, 'DES-CBC', $key, $options = 0, $iv);
    return $encString;
}
