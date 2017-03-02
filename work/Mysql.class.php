<?php
//conf.php  配置文件   init.php  初始化文件
//func.php  函数文件   inc.php   引入文件   class.php   类文件
//incldue   如果引入失败给出一个警告错误  代码继续执行
//require   如果引入失败给出一个致命错误  代码停止
//include_once    引入只能一次
//require_once    引入只能一次

//这是一个关于数据库简单操作的类文件
//连接数据库
//设置字符集为UTF8
//写一个sql语句
//执行sql语句
//根据结果判断  取出数据
class Mysql{
	private $host='';
	private $user='';
	private $pass='';
	private $dbname='';
	private $character='';
	private $conn='';
	private static $mysql=null;
	public static function init($conf){
		if (!self::$mysql instanceof self) {
			self::$mysql= new self($conf);
		}
		return self::$mysql;
	}
	public function ___construct($conf){
		//判断接受的数据是否合法
		$this->host=isset($conf['host'])?$conf['host']:'127.0.0.1';
		$this->user=isset($conf['user'])?$conf['user']:'root';
		$this->pass=isset($conf['pass'])?$conf['pass']:'root';
		$this->dbname=isset($conf['dbname'])?$conf['dbname']:'boke';
		$this->character=isset($conf['character'])?$conf['character']:'UTF8';
		//连接数据库
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname) or die('错误代号:'.mysqli_connect_errno().'<br>'.'错误信息:'.mysqli_connect_error());
		mysqli_set_charset($this->conn,$this->character);
	}
	
		
		
	
	public function setPass($pass){
		$this->pass = $pass;
	}

	//获取 一行数据
	public function getOneRow($sql){
		$query=$this->query($sql);
		return $query?mysqli_fetch_assoc($query):false;
	}


	//获取一个数据
	public function getOneData($sql){
		$query=$this->query($sql);
		if ($query) {
			$reslut=mysqli_fetch_row($query);
			return $reslut[0];
		}
		return false;
	}

	//获取所有数据
	public function getAllRows($sql){
		$query=$this->query($sql);
		if ($query) {
			$list=array();
			while ($res=mysqli_fetch_assoc($query)) {
				$list[]=$res;
			}
			return $list;
		}
		return false;
	}

	//增删改
	public function exec($sql){
		$query=$this->query($sql);
		return $query?true:false;
	}

	private function query($sql){
		$query=mysqli_query($this->conn,$sql);
		if(!$query){
			echo '错误代号:'.mysqli_errno($this->conn).'<br>';
			echo '错误信息:'.mysqli_error($this->conn).'<br>';
			echo '错误sql语句:'.$sql;
			return false;
		}
		return $query;
	}
}
