<?php 
@session_start();
include  dirname(__DIR__) . '/work/mysql.php';	
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
					$_SESSION['login']='yes';
					header("Location:../controller/admin_log.php");
					if ($_POST['c']) {
			 			setcookie('user',$_POST['user']);
			 			setcookie('pass',$_POST['pass']);
					}
				}else{
					
					// echo '登录失败';header("Location:../view/login.html");
					include dirname(__DIR__).'/view/login.html';
				}

			}else{
				// echo '登录失败';header("Location:../view/login.html");
				include dirname(__DIR__).'/view/login.html';
			}
			
		}elseif ($_COOKIE) {
			
			$user=isset($_COOKIE['user'])?$_COOKIE['user']:'';
			$pass=isset($_COOKIE['pass'])?$_COOKIE['pass']:'';
			$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_assoc($result);
			if ($row) {
					$_SESSION['login']='yes';
					header("Location:../controller/admin_log.php");
				}else{
					include dirname(__DIR__).'/view/login.html';
				}	
		}