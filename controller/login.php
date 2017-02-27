<?php 
session_start();
require dirname(__DIR__) . '/mysql.php';	
		if (ispost()) {	
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$capcha=$_POST['capcha'];
			$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
			$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_assoc($result);	
			if ($db->connect_error) {
			die();
			}
			if ($capcha===$_SESSION['capc']) {
				if ($row) {
					echo '登陆成功';
					header("Location:../view/wellcome.html");
					if ($_POST['c']) {
			 			setcookie('user',$_POST['user']);
			 			setcookie('pass',$_POST['pass']);
					}
				}else{
					
					echo '登录失败';header("Location:../view/login.htm");
				}

			}else{
				echo '登录失败';header("Location:../view/login.htm");
			}
			
		}elseif ($_COOKIE['user']&&$_COOKIE['pass']) {
			echo "登陆成功";
			header("Location:../view/wellcome.html");
		}else{
			header("Location:../view/login.htm");
		}
	var_dump($_POST);	
		
		var_dump($_SESSION['capc']);//检查存在session里面的验证码是不是正确的
		
		// include '../model/wellcome.html';