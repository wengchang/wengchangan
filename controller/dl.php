<?php 
session_start();
	
		function ispost(){
			return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
		}
		if (ispost()) {
			
			$user=$_COOKIE['user'];
			$pass=$_COOKIE['pass'];
			$capcha=$_POST['capcha'];

			$db=mysqli_connect('127.0.0.1','root','root','boke',3306);
			$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
			$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_assoc($result);	

			if ($db->connect_error) {
			die();
			}
			if ($capcha===$_SESSION['cap']) {
				echo  yyyyyyyy;
			}else{
				echo nnnnnn;
			}
			
			
				if ($row) {
					header('refresh:3;url=?a=wellcome');

				}else{
					header('refresh:3;url=?a=show');
				}

			
			if ($_POST['c']) {
			 	setcookie('user',$_POST['user']);
			 	setcookie('pass',$_POST['pass']);
			}
		}
		// var_dump($_COOKIE);
		var_dump( $_SESSION['capc']);
		include '../model/dl.html';
		// include '../model/wellcome.html';
		
	





