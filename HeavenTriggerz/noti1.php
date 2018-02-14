<?php
$url = 'https://gateway.sandbox.push.apple.com:2195';
$cert = 'ck.pem';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSLCERT, $cert);
curl_setopt($ch, CURLOPT_SSLCERTPASSWD, "song");
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"device_tokens": ["35B62EAFDFA0CFA8F98786CBDBF0309F1A73478F516057DF2EA6AA6DB2006637"], "aps": {"alert": "test message one!"}}');

$curl_scraped_page = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

var_dump($curl_scraped_page);
var_dump($httpcode);

// if(defined('CURL_HTTP_VERSION_2_0')){

//     $device_token   = 'B5E938E1C0F373B516FC1D1FD88AFEA111690F8CB1D83D9BB6394BC75FC1AEDF';
//     $pem_file       = 'ck.pem';
//     $pem_secret     = 'song';
//     $apns_topic     = 'com.Carlton.ChurchTime';


//     $sample_alert = '{"aps":{"alert":"hi","sound":"default"}}';
//     $url = "https://api.development.push.apple.com/3/device/$device_token";

//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $sample_alert);
//     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array("apns-topic: $apns_topic"));
//     curl_setopt($ch, CURLOPT_SSLCERT, $pem_file);
//     curl_setopt($ch, CURLOPT_SSLCERTPASSWD, $pem_secret);
//     $response = curl_exec($ch);
//     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//     //On successful response you should get true in the response and a status code of 200
//     //A list of responses and status codes is available at 
//     //https://developer.apple.com/library/ios/documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/Chapters/TheNotificationPayload.html#//apple_ref/doc/uid/TP40008194-CH107-SW1

//     var_dump($response);
//     var_dump($httpcode);
// }
?>