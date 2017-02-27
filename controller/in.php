<?php 
$title=$_POST['title'];
$content=$_POST['content'];


var_dump($_POST);
$db=mysqli_connect('127.0.0.1','root','root','boke',3306);
$db->set_charset('utf8');
$sql="INSERT INTO article VALUES(null,'$title','$content',null)";
$result=mysqli_query($db,$sql);


















