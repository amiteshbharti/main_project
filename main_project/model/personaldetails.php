<?php

ini_set("display_errors","1");
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

class personaldetailsModel
{
	public $date;
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
	
	
	
	
	public function getPersonalDetails()
	{
		$username	=	$_SESSION['username'];
		$data['columns']	=	array('first_name','last_name','father_name','email_id','contact_no',
						      'address','country','pin','date_of_birth');
		$data['tables']		=	'user_details';
		$data['conditions']	=	array('user_name'=>$username);
		$result			=	$this->_db->select($data);
		$row			=	$result->fetch(PDO::FETCH_ASSOC);
		
	

		$araydata	=	array();
		
		$araydata['firstname']	=	$row['first_name'];
		$araydata['lastname']	=	$row['last_name'];
		$araydata['fathername']	=	$row['father_name'];
		$araydata['email']		=	$row['email_id'];
		$araydata['number']	=	$row['contact_no'];
		$araydata['address']	=	$row['address'];
		$araydata['country']	=	$row['country'];
		$araydata['pin']	=	$row['pin'];
	$this->date	=	$row['date_of_birth'];
	$reverse_array=null;
	$array=explode('-',$this->date);
	$reverse_array[0]=$array[2];
	$reverse_array[1]=$array[1];
	$reverse_array[2]=$array[0];
	$date	=	 implode('-',$reverse_array);
	$araydata['dob']	=	$date;
	return $araydata;
	}
	
	    
}


?>
