<?php 
$user='123456';
$pass='123456';
function ispost(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
}

if (ispost()) {
	if ($user===$_POST['user']&&$pass===$_POST['pass']) {
		echo '登录成功';
	}else{
		echo '登录失败';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<style type="text/css">
	body{
		text-align: center;

	}

	div{
		background-color: orange;
		padding: 5px;
		margin: 0 auto;

		width: 800px;
		height: 500px;
		border: 5px solid red;
	}
	
	</style>
</head>
<body>
	<div class="div">
		<form action="./dl.php" method="post">
		<p><input type="text" name="user"></p>
		<p><input type="password" name="pass"></p>
		
		<p><input type="submit" name="submit"></p>
		</form>
	</div>	
</body>
</html>