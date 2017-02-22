<?php 









function ispost(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
}
$db=new mysqli('127.0.0.1','root','root','test',3306);
if ($db->connect_error) {
	die();
}
if (ispost()) {
	
	
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$conf="'SELECT * FROM user WHERE user='$user' AND pass='$pass'";
	

	if ($a) {
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
		<P><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'./capcha.php'?>" onclick=this.src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'./capcha.php'?>"+'/'+Math.random()></P>
		</form>
	</div>	
</body>
</html>