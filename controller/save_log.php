<?php 

require dirname(__DIR__).'/work/mysql.php';

	$title=$_GET['title'];
	$time=$_GET['time'];
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
