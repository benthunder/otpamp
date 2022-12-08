<?php

/**
 * Created by PhpStorm.
 * User: SpeedSMS
 * Date: 9/20/15
 * Time: 5:06 PM
 */

class TCSotpAPI {
    const SMS_APP_NAME = 'Ứng dụng The Golden Spoon'; // loai tin nhan quang cao
    const SMS_BRAND_NAME = 'GoldenSpoon'; // loai tin nhan quang cao

    private $ROOT_URL = "http://118.71.251.188:59004/api/v1";

    public function sendSMS($to) {
        $json = json_encode(array('cellphone' => $to, 'method' => 'sms', 'smsBrandName' => TCSotpAPI::SMS_BRAND_NAME, 'appToLogin' => TCSotpAPI::SMS_APP_NAME));

        $headers = array('Content-type: application/json', 'tgs-version: 2.7.5');

        $url = $this->ROOT_URL . '/authentication/request-otp';
        $http = curl_init($url);
        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($http, CURLOPT_POSTFIELDS, $json);
        curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($http, CURLOPT_VERBOSE, 0);
        curl_setopt($http, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($http, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($http, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($http);
        if (curl_errno($http)) {
            return null;
        } else {
            curl_close($http);
            return json_decode($result, true);
        }
    }

    public function verifyToken($to, $otpCode) {
        $json = json_encode(array('cellphone' => $to, 'otp' => $otpCode));

        $headers = array('Content-type: application/json', 'tgs-version: 2.6.0');

        $url = $this->ROOT_URL . '/authentication/login';
        $http = curl_init($url);
        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($http, CURLOPT_POSTFIELDS, $json);
        curl_setopt($http, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($http, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($http, CURLOPT_VERBOSE, 0);
        curl_setopt($http, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($http, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($http, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($http);
        if (curl_errno($http)) {
            return null;
        } else {
            curl_close($http);
            return json_decode($result, true);
        }
    }
}
