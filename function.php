<?php 
// 公共函数文件
// 检查请求类型是不是POST.
function ispost(){
	return (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD']==='POST');
}