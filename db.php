<?php
require_once('../sys_connect.php');
$db=new mysqli($hostname,$user,$password,$dbname);
$db-> set_charset("tis620");