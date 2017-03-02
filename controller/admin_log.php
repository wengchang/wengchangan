<?php 
session_start();
$login=isset($_SESSION['login'])?$_SESSION['login']:'';
if ($login==='yes') {
	require dirname(__DIR__).'/work/mysql.php';

	$sql='SELECT * FROM  article ';
	$result=mysqli_query($db,$sql);
	$list=two_array($result);
































	include dirname(__DIR__).'/admin/admin_log.htm';

}else{
	include dirname(__DIR__).'/controller/login.php';
}

