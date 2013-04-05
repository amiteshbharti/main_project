<?php

/**
* Signup model 
*
* 
*
* LICENSE: Some license information
*
* @category   Zend
* @package    Zend_Magic
* @subpackage Wand
* @copyright  amitesh
* @license    http://framework.zend.com/license   BSD License
* @version    $Id:$
* @link       http://framework.zend.com/package/PackageName
* @since      25 march 2013
*/


//model
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
	
	//public $errors      =   null;
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
		//echo '<pre>';
		//print_r($arrValue);die;
	    //foreach($arrValue as $key=>$row) {
	        $result = $this->db->insert('user_details', $arrValue);
	       // print 'Created row '. $this->_db->lastInsertId(). ' in the table "posts"<br />';
		//}
		if($result)
			return true;
		else 
			false;
		
		} catch (PDOException $e) {
			
			print "Error!: " . $e->getMessage() . "<br/>";
            die();
			//echo 'no duplicate entry';
			
		}
		
 	}
 	
 	
 	 public function captchaProcessing($valArr)
   {
	 
     
  		  $val = $valArr['captcha'];
		  $rand = $valArr['rand'];
		  // echo "value=$val<br/>rand=$rand";
		   
		  		  // echo "value=$val<br/>rand=$rand";
		   
		  if($val==$rand)
		  {
			 echo 1;
			
			 //header('Location: http://www.example.com/');
		  }else{
			 echo "Sorry,may you have entered wrong value.. Try again";	
		  }
		  
		  
	 
	

        //echo "hiiiiii";


    }


}


	
?>

