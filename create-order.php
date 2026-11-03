<?php
session_start(); header('Content-Type: application/json; charset=utf-8');
$config=require __DIR__.'/config.php';
function out($code,$data){http_response_code($code);echo json_encode($data);exit;}
if($_SERVER['REQUEST_METHOD']!=='POST')out(405,['error'=>'Method not allowed']);
if($config['key_id']==='YOUR_RAZORPAY_KEY_ID'||$config['key_secret']==='YOUR_RAZORPAY_KEY_SECRET')out(500,['error'=>'Razorpay API keys are not configured yet.']);
$in=json_decode(file_get_contents('php://input'),true);if(!is_array($in))out(400,['error'=>'Invalid request.']);
$name=trim(($in['name']??''));$email=trim($in['email']??'');$phone=preg_replace('/\D/','',$in['phone']??'');
if($name===''||!filter_var($email,FILTER_VALIDATE_EMAIL)||!preg_match('/^[6-9][0-9]{9}$/',$phone))out(422,['error'=>'Please enter a valid name, email and 10-digit Indian mobile number.']);
if(!function_exists('curl_init'))out(500,['error'=>'PHP cURL is not enabled on this hosting. Contact Hostinger support.']);
$payload=['amount'=>(int)$config['amount'],'currency'=>$config['currency'],'receipt'=>'hustlerai_'.bin2hex(random_bytes(6)),'notes'=>['customer_name'=>substr($name,0,100),'customer_email'=>substr($email,0,120),'customer_phone'=>$phone,'workshop'=>'HustlerAI Workshop']];
$ch=curl_init('https://api.razorpay.com/v1/orders');curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_USERPWD=>$config['key_id'].':'.$config['key_secret'],CURLOPT_HTTPAUTH=>CURLAUTH_BASIC,CURLOPT_HTTPHEADER=>['Content-Type: application/json'],CURLOPT_POSTFIELDS=>json_encode($payload),CURLOPT_TIMEOUT=>25]);$raw=curl_exec($ch);$status=curl_getinfo($ch,CURLINFO_HTTP_CODE);$curlErr=curl_error($ch);curl_close($ch);
if($raw===false)out(502,['error'=>'Could not connect to Razorpay: '.$curlErr]);$order=json_decode($raw,true);if($status<200||$status>=300||empty($order['id']))out(502,['error'=>'Razorpay could not create the order. Check API keys and account settings.']);
$_SESSION['hustlerai_order_id']=$order['id'];$_SESSION['hustlerai_customer']=['name'=>$name,'email'=>$email,'phone'=>$phone];
out(200,['order_id'=>$order['id'],'amount'=>$order['amount'],'key_id'=>$config['key_id'],'currency'=>$config['currency']]);
