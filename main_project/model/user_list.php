<?php
ini_set("display_errors","1");
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

class user_listModel
{
	private $_db;
public function __construct()
	{
$config = array();
						$config['user'] = 'root';
						$config['pass'] = 'root';
						$config['name'] = 'online_test';
						$config['host'] = 'localhost';
						$config['type'] = 'mysql';
						$config['port'] = null;
						$config['persistent'] = true;
						$this->_db = db::instance($config);
		}
	
	
	public function showList()
	{
		$first	=	array();
		$data['columns']	=	array('first_name','last_name','father_name','email_id','contact_no',
						      'address','user_name','state','country','pin','date_of_birth');
		$data['tables']		=	'user_details';
		
		$result			=	$this->_db->select($data);
			
	return $result;
	}
	
	
	public function logManage()
	{
		$first	=	array();
		$data['columns']	=	array('username','ip_address','access_date','browser_details','port','machine_name');
		$data['tables']		=	'log_details';
		
		$result			=	$this->_db->select($data);
	/*$datas=	array();
	while($row=$result->fetch(PDO::FETCH_ASSOC))
	{
		$datas[]	=	$row['username'];
		
	}
	return $datas;*/
	return $result;
	}
	

}

?>
