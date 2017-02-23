<?php 
session_start();
function ispost(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
}
if (ispost()||$_COOKIE) {
	
	$user=$_COOKIE['user']?$_COOKIE['user']:$_POST['user'];
	$pass=$_COOKIE['pass']?$_COOKIE['pass']:$_POST['pass'];
	$capcha=$_POST['capcha'];

	$db=mysqli_connect('127.0.0.1','root','root','boke',3306);
	$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
	$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_assoc($result);	

	if ($db->connect_error) {
	die();
	}
	if ($capcha===$_SESSION['cap']) {
		echo  '都市夫妇';
	}else{
		echo '好多岁发挥双方';
	}
	
	
		if ($row) {
			header("url=/denlu.php");

		}else{
			echo '登录失败';
		}

	
	if ($_POST['c']) {
	 	setcookie('user',$_POST['user']);
	 	setcookie('pass',$_POST['pass']);
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
		<p><input type="text" name="capcha"></p>
		<p><input type="submit" name="submit"></p>
		<i><input name="c" type="checkbox" checked>自动登录</i>
		<P><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'./capcha.php'?>" onclick=this.src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'./capcha.php'?>"+'/'+Math.random()></P>
		</form>
	</div>	
</body>
</html>