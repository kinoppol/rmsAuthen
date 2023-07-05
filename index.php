<?php 
ob_start();
session_start();
print_r($_SESSION);
if(empty($_SESSION['userid'])){
    echo '<meta charset="UTF-8">คุณยังไม่ได้เข้าสู่ระบบ โปรดรอสักครู่<meta http-equiv="refresh" content="2;url=../">';
}