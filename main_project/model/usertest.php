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
				

		$this->dbh->query("create table if not exists $temp_table_name like temp_test_structure");
	

		$max = $this->dbh->prepare("SELECT MAX(qno) as maxGroup FROM $test_type");
		$max->execute();
		$test = $max->fetch(PDO::FETCH_ASSOC);

	    $a=$test['maxGroup'];
		
		$min = $this->dbh->prepare("SELECT MIN(qno) as minGroup FROM $test_type");
		$min->execute();
		$test = $min->fetch(PDO::FETCH_ASSOC);
    	$b=$test['minGroup'];
		
 		$arr=range($a,$b);
 		shuffle($arr);

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
		  
		  public function testQuestions($qid)
		  {
		  	$q_id			=	$qid;
		  		
			$data['columns']	=	array('qorgid','qtempsrno','question','A','B','C','D','ans','tempans');
			$data['tables']		=	$_SESSION['testname'];
			$data['conditions']	=	array('qtempsrno'=>$q_id);
			
			$results		=	$this->_db->select($data);
			return $results;								  
		  		  
		  }
		  
		  public function previousQues($aray)
		  {

		  	$q_id			=	$aray['qid'];
		  	$temp_ans		=	$aray['R1'];
		  	$uid			=	$q_id+1;
		  	$data['columns']	=	array('tempans'=>$temp_ans);
		  	$data['tables']		=	$_SESSION['testname'];
		  	$data['conditions']	=	array('qtempsrno'=>$uid);
		  	$result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		  	
		  	if($result)
		  	{
		  		$data['columns']	=	array('qorgid','qtempsrno','question','A','B','C','D','ans','tempans');
		  		$data['tables']		=	$_SESSION['testname'];
		  		$data['conditions']	=	array('qtempsrno'=>$q_id);
		  		 
		  		$results		=	$this->_db->select($data);
		  		return $results;
		  	}
		  	
		  	
		  }
		  
		  public function nextQues($aray)
		  {
		  	$q_id			=	$aray['qid'];
		  	$temp_ans		=	$aray['R1'];
		  	$uid			=	$q_id-1;
		  	$data['columns']	=	array('tempans'=>$temp_ans);
		  	$data['tables']		=	$_SESSION['testname'];
		  	$data['conditions']	=	array('qtempsrno'=>$uid);
		  	$result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		  	 
		  	if($result)
		  	{
		  		$data['columns']	=	array('qorgid','qtempsrno','question','A','B','C','D','ans','tempans');
		  		$data['tables']		=	$_SESSION['testname'];
		  		$data['conditions']	=	array('qtempsrno'=>$q_id);
		  			
		  		$results		=	$this->_db->select($data);
		  		return $results;
		  	}
		  }
        public function updateLast($aray)
        {
        	
        	$q_id			=	$aray['qid'];
		  	$temp_ans		=	$aray['R1'];
		  	$uid			=	$q_id-1;
			$data['columns']	=	array('tempans'=>$temp_ans);
        	$data['tables']		=	$_SESSION['testname'];
        	$data['conditions']	=	array('qtempsrno'=>$uid);
        	$result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
        	 if($result)
        	 {
        	 	return "done";
        	 }
        }
        
        public function seeLast($check)
        {
        	$data['columns']	=	array('qorgid','qtempsrno','question','A','B','C','D','ans','tempans');
        	$data['tables']		=	$_SESSION['testname'];
        	$data['conditions']	=	array('qtempsrno'=>$check);
        	
        	$results		=	$this->_db->select($data);
        	return $results;
        	 
        } 
        
        public function getCalc($aray)
        {
        	$qid			=	$aray['qid'];
        	$temp_ans		=	$aray['R1'];
        	
        	$data['columns']	=	array('tempans'=>$temp_ans);
        	
		$data['tables']		=	$_SESSION['testname'];
        	$data['conditions']	=	array('qtempsrno'=>$qid);
        	$result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
        	 
		if($result)
		{
			return   true;
		}else
		{
			return false;
		}
        	
	      }
  
	public function calResult()
	{
			$data['columns']	=	array('qorgid','qtempsrno','question','A','B','C','D','ans','tempans');
        		$data['tables']		=	$_SESSION['testname'];
        		$results		=	$this->_db->select($data);
        		$true_ans	=	0;
        		while($row	=	$results->fetch(PDO::FETCH_ASSOC))
        	{
			
			if($row['tempans']==$row['ans'])
			{
        			$true_ans++;
			}
        	
        	}
        		

		
		return $true_ans;
	}
        
        
        public function updateCertificate($score)
        {
        	$c_result	=	"";
        	$marks		=	$score;
        	$status		=	1;
        	$qid		=	0;
        	if($marks>=10)
        	{
        		$c_result	=	"PASS";
        	}else {
        		$c_result	=	"FAIL";
        	}
        	$data['columns']	=	array('status'=>$status,'qid'=>$qid,'certification_result'=>$c_result,'marks_obt'=>$marks);
        	$data['tables']		=	'certification_details';
        	$data['conditions']	=	array('certification_id'=>$_SESSION['testname']);
        	$result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
        		return $marks;
        	
        	
        }
	public function showResult($id)
	{
		$data['columns']	=	array('certification_id','marks_obt','certification_name','certification_result');
        	$data['tables']		=	'certification_details';
        	$data['conditions']	=	array('certification_id'=>$id);
		$result		=	$this->_db->select($data);
		if($result)
		{
			
		$row	=	$result->fetch(PDO::FETCH_ASSOC);
		$aray	=	array();
		$aray['id']	=	$row['certification_id'];
		$aray['marks']	=	$row['marks_obt'];
		$aray['name']	=	$row['certification_name'];
		$aray['result']	=	$row['certification_result'];
		return $aray;
		}
	}
	
	public function insertResultDetails()
	{
		$query		=	"insert into result_all(id,qtempsrno,question,A,B,C,D,ans,tempans) select certification_id,qtempsrno,question,A,B,C,D,ans,tempans from ".$_SESSION['testname']." as a join certification_details as b on b.certification_id='".$_SESSION['testname']."';" ;
		$result		=	$this->dbh->query($query);
		$results	=	$this->dbh->query("drop table ".$_SESSION['testname']);
		if($results)
		{
			return true;
		}else{
			return false;
		}
	}
  
}

?>
