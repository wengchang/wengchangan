<?php 
session_start();
	
		function ispost(){
			return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
		}
		if (ispost()) {
			
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$capcha=$_POST['capcha'];

			$db=mysqli_connect('127.0.0.1','root','root','boke',3306);
			$db->set_charset('UTF8');
			$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
			$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_assoc($result);	

			if ($db->connect_error) {
			die();
			}
			if ($capcha===$_SESSION['capc']) {
				if ($row) {
					echo '登陆成功';
					header("Location:../model/wellcome.html");
					if ($_POST['c']) {
			 			setcookie('user',$_POST['user']);
			 			setcookie('pass',$_POST['pass']);
					}
				}else{
					
					echo '登录失败';header("Location:../model/dl.html");
				}

			}else{
				echo '登录失败';header("Location:../model/dl.html");
			}
			
		}elseif ($_COOKIE['user']&&$_COOKIE['pass']) {
			echo "登陆成功";
			header("Location:../model/wellcome.html");
		}else{
			header("Location:../model/dl.html");
		}
		
		
		// var_dump($_SESSION['capc']);检查存在session里面的验证码是不是正确的
		
		// include '../model/wellcome.html';
		
	





