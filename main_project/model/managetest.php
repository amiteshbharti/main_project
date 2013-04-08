<?php
ini_set("display_errors","1");
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
include MODEL_PATH."connection.php";


/**
* @classname            managetestModel
*
* This class contain all methods that describes all the functionality that how to create a test and
  then add or delete questions from that particular test....

* @package              Zend_Magic

* @author               Amitesh Bharti
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/


class managetestModel
{
    public $dbh;
    public $conn_obj;

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
                
                
    public function testAdded($tablename)
    {
         if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
              header("Location: index.php?controller=login&function=execute_process");
//	      exit();
         }
                	
         $query="CREATE TABLE $tablename(
	 `qno` INT(5) NOT NULL AUTO_INCREMENT, 
	 `question` VARCHAR(250) NOT NULL, 
	 `A` VARCHAR(100) NOT NULL, 
         `B` VARCHAR(100) NOT NULL, 
	 `C` VARCHAR(100) NOT NULL, 
         `D` VARCHAR(100) NOT NULL, 
         `ans` VARCHAR(5) NOT NULL,
	 PRIMARY KEY (`qno`)
	 )";	 
	 if($_POST){  
	     if(!empty($tablename)){    		  	
   
   		if($this->dbh->query($query)){
   
		    $query="INSERT INTO `testlist` VALUES ('$tablename','ACTIVE')";
	   	    $this->dbh->query($query);

        	    return 1;        		
        	}else{
        	      return "Test With Name ".$tablename." Allready exists or this test name not allowed(avoid special characters)  !";
        	 }
	     }else{
		   return "<center>YOU CAN NOT LEFT FIELD EMPTY!</center>";
	      }
	  }
                    
    }
		
		
    public function listingTest()
    {	
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//	    exit();
	}
        $data['columns']  =	array('test_name','test_status');
        $data['tables']	  =	'testlist';
        $result 	  =	$this->_db->select($data);
        return $result;
    }
		
		
    public function changeStatus($test)
    {
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//	    exit();
        }
// 	$data['columns']  =	array('test_status');
// 	$data['tables']	  =	'testlist';
// 	$result 	  =	$this->_db->select($data);
// 	$row              =     $result->fetch(PDO::FETCH_ASSOC);
// 	$testStatus       =     $row['test_status'];
			
				
			
	$certification	=	$test['name'];
        $value		=	$test['value'];
//	return $certification."".$value;
        $data['columns']	=	array('test_status'=>$value);
        $data['tables']	        =	'testlist';
        $data['conditions']	=	array('test_name'=>trim($certification));
	$result		        =	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
//      return $testStatus;
		    
		    /**********************************/
	if($result){
		  	        
	     $data['columns']	=	array('test_status');
 	     $data['tables']	=	'testlist';
 	     $result 		=	$this->_db->select($data);
 	     $row               =       $result->fetch(PDO::FETCH_ASSOC);
 	     $testStatus        =       $row['test_status'];
	     return $testStatus;
        } 
        if($result){
	    return $value; 			//"updated";
		    	
	}else{
	     return 0; 			//"not updated";
	 }
    }
		
    public function addNewQuestion()
    {   
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        {
            header("Location: index.php?controller=login&function=execute_process");
//          exit();
        }
	$data['columns']   =	array('test_name');
        $data['tables']	   =	'testlist';
		    
	$result		=	$this->_db->select($data);
	return $result;
    }
		
		
    public function questionAdded($aray)
    {   
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//	    exit();
	}
        $table		=	$aray['test'];
        $question	=	$aray['question'];
        $a		=	$aray['A'];
        $b		=	$aray['B'];
        $c		=	$aray['C'];
	
        $d		=	$aray['D'];
        $ans		=	$aray['ans'];
	$data['columns']	=	array('question'=>$question,'A'=>$a,'B'=>$b,'C'=>$c,'D'=>$d,'ans'=>$ans);
	$data['tables']	=	$table;
	$result		=	$this->_db->insert($data['tables'],$data['columns']);
        if($result){
	    return "QUESTION HAS BEEN INSERTED";
	}else{
	      return "not inserted";
          }
		    
		    
    }
		
    public function viewAllQuestions()
    {
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//	    exit();
	}
	$data['columns']  =	array('test_name');
        $data['tables']	  =	'testlist';
		    
	$result		  =	$this->_db->select($data);
        return $result;
    }
		
    public function questionViewed($table)
    {	
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//          exit();
	}
	$table	=	"";
	if(isset($_SESSION['test'])){
	$table	=	$_SESSION['test'];
        }
        $data['columns']	=	array('qno','question','A','B','C','D','ans');
	$data['tables']	=	$table;
	$result		=	$this->_db->select($data);
//      return $result;
		   
		   
        loadView('questionsviewed.php',$result);
		    
    }
    public function deleteQues($no)
    {   
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
//	    exit();
	}
//      $data['columns']	=	array('qno','question','A','B','C','D','ans');
	$data['tables']	=	$_SESSION['test'];
	$data['conditions']	=	array('qno'=>$no);
	$result		=	$this->_db->delete($data['tables'],$data['conditions']);
	if($result){
	    return "done";
		    
	}
		    
    }
		
		
	public function editQues($qid)
	{   
	    if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
		header("Location: index.php?controller=login&function=execute_process");
//	        exit();
	    } 
	    $data['columns']		=	array('qno','question','A','B','C','D','ans');
	    $data['tables']		=	$_SESSION['test'];
	    $data['conditions']		=	array("qno"=>$qid);
		    
	    $result			=	$this->_db->select($data);
//          print_r($result);		    
		
			return $result;
	}
		
	public function quesUpdate($aray)
	{
	    if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
	    {
	        header("Location: index.php?controller=login&function=execute_process");
//	        exit();
	    }
	    $qid				=	$aray['qid'];
	    $question		=	$aray['question'];
	    $a				=	$aray['A'];
	    $b				=	$aray['B'];
	    $c				=	$aray['C'];
	    $d				=	$aray['D'];
	    $ans			=	$aray['ans'];
			
		
	    $data['columns']		=	array('question'=>$question,'A'=>$a,'B'=>$b,'C'=>$c,'D'=>$d,'ans'=>$ans);
	    $data['tables']		=	$_SESSION['test'];
	    $data['conditions']		=	array('qno'=>$qid);

	    $result		=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
	    if($result){
		return "updated";
	    }else{
		  return "not updated";
	     }
				
        }
		
		
		
	public function manageUnsubsciption($pass)
	{   
	    if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
	    {
		header("Location: index.php?controller=login&function=execute_process");
//	        exit();
	    }
	    $name=$_SESSION['username'];
	    $password=$_SESSION['password'];
	    $pass_confirm=$pass;
//          echo "fdsf";
//          if($value=='yes'){

				
//          $sql="select password  from user_master where user_id='$name'";
//          $result=mysql_query($sql);
//          $result_array=mysql_fetch_array($result);
//          echo $result_array['password'];
				
	    $data['columns']	=	array('password');
	    $data['tables']	=	'user_master';
	    $data['conditions']	=	array('user_id'=>$name);
				
	    $result	        =	$this->_db->select($data);
				
				
//          $row=$arrData->fetch(PDO::FETCH_ASSOC);
//          $row=$result->fetch(PDO::FETCH_ASSOC);
	    $row = $result->fetch(PDO::FETCH_ASSOC);
				
			
//          print_r ($row);
	    if($pass_confirm==$row['password'])	{
		$query="delete  user_master , user_details from user_master JOIN user_details ON  user_id=user_name where user_id='$name'";
		if($this->dbh->query($query)){
   
		    echo "<center><b>You are now unsubscribe.If yoiu want to login again then you have to sign up again.</b></center>";
		    unset($_SESSION['username']);
		}
					
					
					
//          echo "hii required to put pdo syntax";
	    }else{
		  echo "<center><b>Sorry! You have entered wrong password.</b></center>";
             }
		 
        }
			
	  
}
