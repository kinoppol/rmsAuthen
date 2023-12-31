<?php 
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('db.php');
$userid=$_SESSION['userid'];
$SQL='select config_value from config where config_id=500';
$result=$db->query($SQL);
$data=$result->fetch_assoc();
$school_name=iconv('tis-620','utf-8',$data['config_value']);


$SQL='select config_value from config where config_id=3';
$result=$db->query($SQL);
$data=$result->fetch_assoc();
$title=iconv('tis-620','utf-8',$data['config_value']);

$SQL='select * from people where people_id='.$userid;
$result=$db->query($SQL);
$data=$result->fetch_assoc();
$name=iconv('tis-620','utf-8',$data['people_name']);
$surname=iconv('tis-620','utf-8',$data['people_surname']);
$fullname=$name.' '.$surname;
$pic=iconv('tis-620','utf-8',$data['people_pic']);
if(empty($pic)){
	$picture_url='../picture.png';
}else{
	$picture_url='../files/'.$pic;
}
?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://rms.bncc.ac.th/portal/captiveportal-jquery-3.4.0.min.js" type="text/javascript" ></script>
  <meta charset="tis620">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title><?php print $title; ?></title>
  <style>
	  #content,.login,.login-card a,.login-card h1,h3,.login-help{text-align:center}body,html{margin:0;padding:0;width:100%;height:100%;display:table}#content{ font-family: 'Designil Font', 'Helvetica', sans-serif;background:url(http://rms.rvc.ac.th/bg-rcheva.png) center center no-repeat fixed;opacity: 0;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;display:table-cell;vertical-align:middle}.login-card{padding:40px;width:274px;background-color:rgba(255,255,255,.8);margin:0 auto 10px;border-radius:2px;box-shadow:0 2px 2px rgba(0,0,0,.3);overflow:hidden}.login-card h3{font-weight:200;font-size:1.5em;color:#1383c6}h1{font-weight:400;font-size:2.3em;color:#1383c6}.login-card h1 span{color:#f26721}.login-card img{width:50%;height:50%}.login-card input[type=submit]{width:100%;display:block;margin-bottom:10px;position:relative}.login-card input[type=text],input[type=password]{height:44px;font-size:16px;width:100%;margin-bottom:10px;-webkit-appearance:none;background:#fff;border:1px solid #d9d9d9;border-top:1px solid silver;padding:0 8px;box-sizing:border-box;-moz-box-sizing:border-box}.login-card input[type=text]:hover,input[type=password]:hover{border:1px solid #b9b9b9;border-top:1px solid #a0a0a0;-moz-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1)}.login{font-size:14px;font-family:Arial,sans-serif;font-weight:700;height:36px;padding:0 8px}.login-submit{-webkit-appearance:none;-moz-appearance:none;appearance:none;border:0;color:#fff;text-shadow:0 1px rgba(0,0,0,.1);background-color:#4d90fe}.login-submit:disabled{opacity:.6}.login-submit:hover{border:0;text-shadow:0 1px rgba(0,0,0,.3);background-color:#357ae8}.login-card a{text-decoration:none;color:#222;font-weight:400;display:inline-block;opacity:.6;transition:opacity ease .5s}.login-card a:hover{opacity:1}.login-help{width:100%;font-size:12px}.list{list-style-type:none;padding:0}.list__item{margin:0 0 .7rem;padding:0}label{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;text-align:left;font-size:14px;}input[type=checkbox]{-webkit-box-flex:0;-webkit-flex:none;-ms-flex:none;flex:none;margin-right:10px;float:left}@media screen and (max-width:450px){.login-card{width:70%!important}.login-card img{width:30%;height:30%}}
  </style>
</head>

<body bgcolor="#AACCFF">
<div id="content">
	<div class="login-card">
		<img src="../rms-icon.png"/><br>
 		<h3><?php print $school_name; ?></h3>
		<div style="text-align:center"><img src="<?php print $picture_url; ?>" style="border-radius: 50%;width:100px;
  height:100px;
  object-fit:cover;"></div>
	  <form name="login_form" method="post" action="$PORTAL_ACTION$">
		<button class="login login-submit">ลงชื่อเข้าใช้ด้วยชื่อ "<?php print $fullname; ?>"</button>
	  </form>
	</div>
</div>
</body>
<script type="text/javascript">
$(function(){

		$('#content').animate({ opacity: 1 }, { duration: 1000 });
	});
	</script>
</html>
