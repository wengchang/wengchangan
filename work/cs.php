<?php 
include './Mysql.class.php';
$v=array('host'=>'127.0.0.1','user'=>'root','pass'=>'root','dbname'=>'boke');
$sql="SELECT * FROM user WHERE user='{$user}' AND pass='{$pass}'";
$a=Mysql::init($v);

var_dump($a->getOneRow($sql));











 ?>