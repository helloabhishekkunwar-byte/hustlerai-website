<?php
session_start();header('Content-Type: application/json; charset=utf-8');$config=require __DIR__.'/config.php';
function out($code,$data){http_response_code($code);echo json_encode($data);exit;}
if($_SERVER['REQUEST_METHOD']!=='POST')out(405,['error'=>'Method not allowed']);
$in=json_decode(file_get_contents('php://input'),true);$paymentId=$in['razorpay_payment_id']??'';$orderId=$in['razorpay_order_id']??'';$signature=$in['razorpay_signature']??'';$savedOrder=$_SESSION['hustlerai_order_id']??'';
if(!$savedOrder||!$paymentId||!$orderId||!$signature||!hash_equals($savedOrder,$orderId))out(400,['verified'=>false,'error'=>'Payment details did not match this checkout session.']);
$expected=hash_hmac('sha256',$savedOrder.'|'.$paymentId,$config['key_secret']);if(!hash_equals($expected,$signature))out(400,['verified'=>false,'error'=>'Razorpay signature verification failed.']);
// Also query Razorpay and only mark captured payments as fully successful.
$ch=curl_init('https://api.razorpay.com/v1/payments/'.rawurlencode($paymentId));curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_USERPWD=>$config['key_id'].':'.$config['key_secret'],CURLOPT_HTTPAUTH=>CURLAUTH_BASIC,CURLOPT_TIMEOUT=>20]);$raw=curl_exec($ch);$status=curl_getinfo($ch,CURLINFO_HTTP_CODE);curl_close($ch);$payment=json_decode($raw?:'',true);
if($status<200||$status>=300||!is_array($payment)||($payment['order_id']??'')!==$savedOrder||($payment['status']??'')!=='captured')out(202,['verified'=>false,'error'=>'Payment received but is not yet captured. Please check Razorpay Dashboard before confirming the seat.']);
$_SESSION['hustlerai_paid']=true;$_SESSION['hustlerai_payment_id']=$paymentId;unset($_SESSION['hustlerai_order_id']);out(200,['verified'=>true]);
