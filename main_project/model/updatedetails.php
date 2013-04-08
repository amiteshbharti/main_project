<?php
ini_set("display_errors","1");
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

/**
* @classname            updatedetailsModel
*
* This class contain all methods that models all the updates of the user....

* @package              Zend_Magic

* @author               Amitesh Bharti
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/

class updatedetailsModel
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
						      'address','country','pin','state','date_of_birth');
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
	$araydata['state']	=	$row['state'];
	$this->date	=	$row['date_of_birth'];
	
	$reverse_array=null;
	$reverse_array=explode('-',$this->date);
	$araydata['day']	=	$reverse_array[0];
	$araydata['month']	=	$reverse_array[1];
	$araydata['year']	=	$reverse_array[2];
	
	return $araydata;
    }
	
    public function updateInformation($aray)
    {
	$username	=	$_SESSION['username'];
		
	$firstname	=	$aray['fname'];
	$lastname	=	$aray['lname'];
	$fathername	=	$aray['fathername'];
	$email		=	$aray['email'];
	$number		=	$aray['number'];
	$address	=	$aray['address'];
	$country	=	$aray['country'];
	$pin		=	$aray['pin'];
	$state		=	$aray['state'];
		
	$araydate	=	array();
	$araydate[]	= $aray['day'];
	$araydate[]	= $aray['month'];
	$araydate[]	= $aray['year'];
		
	$date	=	implode("-",$araydate);
		
		
	$data['columns']	=	array('first_name'=>$firstname,'last_name'=>$lastname,'father_name'=>$fathername,
				'email_id'=>$email,'contact_no'=>$number,
				'address'=>$address,'country'=>$country,'pin'=>$pin,'state'=>$state,'date_of_birth'=>$date);
		
	$data['tables']		=	'user_details';
		
	$data['conditions']	=	array('user_name'=>$username);
		
	$result			=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
//      $row			=	$result->fetch(PDO::FETCH_ASSOC);
	if($result){
	    return "Information updated";
	}else {
	    return "Error in Updation";
	 }
		
    }
	
    function change_password($aray)
    {
	$oldpass	=	$aray['oldpass'];
	$newpass	=	$aray['newpass'];
	$retypepass	=	$aray['retypepass'];
	$username	=	$_SESSION['username'];
//      return $retypepass;
	$data['columns']	=	array('password');
	$data['tables']		=	'user_master';
	$data['conditions']	=	array('password'=>$oldpass);
		
	$result		=	$this->_db->select($data);
		
	if($result){
	    $row	=	$result->fetch(PDO::FETCH_ASSOC);
	    if($row['password']==$oldpass){
	        $data['columns']	=	array('password'=>$newpass);
		$data['tables']		=	'user_master';
		$data['conditions']	=	array('user_id'=>$username);
		$result			=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
//              $row			=	$result->fetch(PDO::FETCH_ASSOC);
		if($result){
		  return "Password updated";
		}else {
		     return "Error in Updation";
		 }
	     }else{
		   return "Wrong old password";
	       }
	}
		
    }
	
	    
}


?>
