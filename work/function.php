<?php 
// 公共函数文件
// 检查请求类型是不是POST.
function ispost(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
}
function isget(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='GET');
}
// 把数据库表里取出来的行包成数组返回一个二维数组
function two_array($result){
	if ($result) {
		$list=array();
		while ($res=mysqli_fetch_assoc($result)) {
			$list[]=$res;
		}
	}
	return $list;
}
// 