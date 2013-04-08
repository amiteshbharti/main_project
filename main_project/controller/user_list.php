<?php

ini_set("display_errors","1");
session_start();

/**
* @classname            user_listController
*
* This class contain all methods that controls the list of number of users...........
* @package              Zend_Magic


* @author               Arpit Goyal
* @date                 18-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    25-03-2013
* ...
*/

class user_listController
{
    public function __construct()
    {
        if((empty($_SESSION['username']))){
	    header("location:index.php");
	}
    }
        
    public function showList()
    {
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
            header("Location: index.php?controller=login&function=execute_process");
            //	exit();
        }
        $a  =   loadModel('user_list','showList');
        /*foreach($a as $key=>$value)
	  {
	      echo $value;
	  }*/
	//print_r($a);
	loadView('user_list.php',$a);
    }
	      
	
    public function logManage()
    {
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
	    //	exit();
	}
	$a  =   loadModel('user_list','logManage');
        /*foreach($a as $key=>$value)
	  {
	      echo $value;
	  }*/
	  //print_r($a);
	loadView('logManage.php',$a);   	
    }      


	
	
}

?>
