<?php

ini_set("display_errors","1");
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

class certificationModel
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
                
                public function userQuesAns($id)
                {
                $data['columns']	=	array('qtempsrno','question','A','B','C','D','ans','tempans');
        	$data['tables']		=	'result_all';
        	$data['conditions']	=	array('id'=>$id);
        	
        	$results		=	$this->_db->select($data);
        	return $results;

                }
}
?>