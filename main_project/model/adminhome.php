<?php
ini_set("diaplay_errors","1");
//session_start();    
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

/**
* @classname            adminhomeModel
*
* This class contain all methods that describes all the functionality of admin part....

* @package              Zend_Magic

* @author               Amitesh Bharti
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/

class adminhomeModel
{
    private $_query;
    private $_password;
    public $_db;
    
    public function __construct()
    {
        $config['user'] = 'root';
        $config['pass'] = 'root';
        $config['name'] = 'online_test';
        $config['host'] = 'localhost';
        $config['type'] = 'mysql';
        $config['port'] = null;
        $config['persistent'] = true;	

        $this->_db = db::instance($config);
	$config = array();
    }
        
        
    public function execute_name()
    {
        $this->_adminName   =   $_SESSION['username'];
        $data['columns']    =   array('first_name');
        $data['tables']     =   'user_details';
        $data['conditions'] =   array("user_name"=>$this->_adminName);
        $result		=	$this->_db->select($data);
    
        $row		=	$result->fetch(PDO::FETCH_ASSOC);
    
        $name   =   ucwords($row['first_name']);
        $_SESSION['firstname']  =   $name;
        return $name;
  
    }
    public function log_session()
    {
	$arrval	=	array();
	$arrval['username']	=	$_SESSION['username'];
	$arrval['ip_address']	=	ip_address;
	$arrval['access_date']	=	access_date;
	$arrval['browser_details']	=	browser_details;
	$arrval['port']	=	port_number;
	$arrval['machine_name']	=	machine_name;
        if(!empty($_SESSION['log'])){
			
	    $result = $this->_db->insert('log_details', $arrval);
    
    
            if($result){
                           return "done insertion";
                       }
            }else{
                     return "session ni hai";
                 }
                
	    unset($_SESSION['log']);
		
    
    }


    public function logout()
    {
    	
    	unset($_SESSION['username']);
    	unset($_SESSION['password']);
    	
        //	session_destroy();
    	
    	header("location:".SITE_PATH."index.php?controller=login");
    
      }

        
        
    
}



