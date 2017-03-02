<?php 
require dirname(__DIR__).'/work/mysql.php';
if (ispost()) {
	$title=$_POST['title'];
	$content=$_POST['content'];
	if (!$_POST['title']==''&&$_POST['content']) {
		$sql="INSERT INTO article VALUES(null,'$title','$content',null)";
		$result=mysqli_query($db,$sql);
	}
}

include dirname(__DIR__).'/admin_log.html';

















