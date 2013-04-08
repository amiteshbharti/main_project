<?php
/**
* @classname            signupModel
*
* This class contain all methods that models the signup details of a particular user....

* @package              Zend_Magic

* @author               Amitesh Bharti
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

ini_set("display_errors","1");
include "connection.php";
session_start();
class signupModel
{


    private	$_username  =   "";
	
    private	$_password  =   "";
    private	$_passlen   =  "";
	
//  public $errors      =   null;
    public $errors      =   array();
    private $_query     =   "";
    public	$conn_obj;
	
	
    function __construct()
    {
	$config = array();
	$config['user'] = 'root';
	$config['pass'] = 'root';
	$config['name'] = 'online_test';
	$config['host'] = 'localhost';
	$config['type'] = 'mysql';
	$config['port'] = null;
	$config['persistent'] = true;
	$this->db = db::instance($config);
	
    }
	

    function saveUser($arrValue)
    {
	try{
//          echo '<pre>';
//          print_r($arrValue);die;
//          foreach($arrValue as $key=>$row) {
        $userName=$arrValue['user_name']; 
        
        $data['columns']	=	array('user_name');
		$data['tables']		=	'user_details';
		$data['conditions']	=	array('user_name'=>$userName);
		$result		=	$this->db->select($data);
		
		
		$row		=	$result->fetch(PDO::FETCH_ASSOC);
		if(!empty($row['user_name']))
		{
			return false;
			
			}
		else{    
			//insert user details 	
			$result = $this->db->insert('user_details', $arrValue);
			if($result){
				return true;
				//	echo 'submit';
			 }
			else 
				return  false;
		}
	        
//          print 'Created row '. $this->_db->lastInsertId(). ' in the table "posts"<br />';
//         }
    
		
    } catch (PDOException $e) {
			
	print "Error!: " . $e->getMessage() . "<br/>";
        die();
//    echo 'no duplicate entry';
			
    }
		
    }
 	
 	
    public function captchaProcessing($valArr)
    {
	 
     
         $val = $valArr['captcha'];
	 $rand = $valArr['rand'];
//       echo "value=$val<br/>rand=$rand";
		   
//       echo "value=$val<br/>rand=$rand";
		   
	 if($val==$rand)
	 {
	     echo 1;
			
//       header('Location: http://www.example.com/');
	 }else{
	       echo "Sorry,may you have entered wrong value.. Try again";	
	  }
		  
		  
	 
	

//       echo "hiiiiii";


    }


}


	
?>

