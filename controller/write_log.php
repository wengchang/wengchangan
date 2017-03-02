<?php 
session_start();
$login=isset($_SESSION['login'])?$_SESSION['login']:'';
if ($login==='yes') {
	require dirname(__DIR__).'/work/mysql.php';
	$action=isset($_GET['action'])?$_GET['action']:'';

	switch ($action) {
		case 'update':
			$id=isset($_GET['id'])&& is_numeric($_GET['id'])?intval($_GET['id']):0;
			$sql="SELECT * FROM article WHERE `id`='$id'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_assoc($result);
		
			if (ispost()) {
				$titl=$_POST['title'];
				$conten=$_POST['content'];
				$sql="UPDATE article set title='$titl', content='$conten' WHERE id='$id'";
				$result=mysqli_query($db,$sql);
				header("Location:../controller/admin_log.php");
				echo '成功';
			}



	require dirname(__DIR__).'/admin/write_logl.htm';
			break;
		
		default:
			if (ispost()) {
				$title=$_POST['title'];
				$content=$_POST['content'];
				if (!$_POST['title']==''&&$_POST['content']) {
					$sql="INSERT INTO article VALUES(null,'$title','$content',null)";
					$result=mysqli_query($db,$sql);
				}
			}
			include dirname(__DIR__).'/admin/write_log.htm';
			break;
	}
}else{
	include dirname(__DIR__).'/controller/login.php';
}