<?php 
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
//print_r($_SESSION);
if(empty($_SESSION['userid'])){
    echo '<title>RMS-Authentication</title><meta http-equiv="Content-type" content="text/html; charset=utf-8" />คุณยังไม่ได้เข้าสู่ระบบ โปรดรอสักครู่..<meta http-equiv="refresh" content="2;url=../">';
}else{
    echo '<title>RMS-Authentication</title><meta http-equiv="Content-type" content="text/html; charset=utf-8" />โปรดรอสักครู่..<meta http-equiv="refresh" content="2;url=./authen.php">';
}