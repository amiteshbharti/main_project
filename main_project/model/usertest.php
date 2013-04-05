<?php


ini_set("display_errors","1");

include MODEL_PATH.'database.php';

require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

include MODEL_PATH.'connection.php';

class usertestModel
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
				
					$this->conn_obj	=	new database();
		$this->dbh	=	$this->conn_obj->connect();
	

                
                
                }
        
        
                public function startTest()
                  {
            
                  $data['columns']        =       array('test_name','test_status');
                  $data['tables']         =       'testlist';
                  $data['conditions']     =       array('test_status'=>'ACTIVE');
                  
                  $result                 =       $this->_db->select($data);
                  return $result;
                  
                  }
                  
                  
                  public function testId()
                  {
                        $datas  =   array();
                    	$arr=range("A","Z");
                	shuffle($arr);
                	$datas['test_id'] =    "MD".rand(0,9).rand(0,9).$arr['7'].$arr['4'].$arr['4'].rand(0,9).rand(0,9).rand(0,9).$arr[7].$arr[6];
                        return $datas;
                  }
		  
			
			public function startNewTest($aray)
			{
				$temp_table_name	=	$aray['temp_table_name'];
				$test_type			=	$aray['test_type'];
				//CREATING TABLE STRUCTURE FOR TEMP TABLE
		$this->dbh->query("create table if not exists $temp_table_name like temp_test_structure");
	
		//INSERTING RANDOM 5 QUESTIONS to temporary test
// 		$min=$this->dbh->query("SELECT min(qno) FROM $test_type ");
// 		$max=$this->dbh->query("SELECT max(qno) FROM $test_type ");

		$max = $this->dbh->prepare("SELECT MAX(qno) as maxGroup FROM $test_type");
		$max->execute();
		$test = $max->fetch(PDO::FETCH_ASSOC);
//		print_r ($test);
	    $a=$test['maxGroup'];
		
		$min = $this->dbh->prepare("SELECT MIN(qno) as minGroup FROM $test_type");
		$min->execute();
		$test = $min->fetch(PDO::FETCH_ASSOC);
    	$b=$test['minGroup'];
		
 		$arr=range($a,$b);
 		shuffle($arr);
 		//print_r ($arr);
		$i=1;
		foreach ($arr as $key=>$value){
				
				$result = $this->dbh->query("SELECT * FROM $test_type where qno=$value");
				while ($row = $result->fetch(PDO::FETCH_NUM)){
			       	
			       		$this->dbh->query("INSERT INTO $temp_table_name VALUES ($row[0],$i, '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]','NA')");
			       	
	   				 $i=$i+1;
						 
				}
					
				if($i>20){ 
					break;
				}
             
		
			}
			
			return true;
			
			}

		  public function insertDetails($datas)
		  {
			$username		=	$_SESSION['username'];
			$certification_date	=	date('l jS \of F Y h:i:s A');
			$temp_table		=	$datas['temp_table_name'];
			$test_type		=	$datas['test_type'];
			
			
			$data['columns']	=	array('username'=>$username,'certification_id'=>$temp_table,'certification_name'=>$test_type,'status'=>0,'qid'=>1,
							      'certification_date'=>$certification_date,'marks_max'=>20,'marks_obt'=>0,'certification_result'=>'N/A');
			
			$data['tables']		=	'certification_details';
			
			$result			=	$this->_db->insert($data['tables'],$data['columns']);
			if($result)
			{
				return "done";
			}else{
				return "Error..!!";
			}
		  }
        
        
        
        
}





?>
