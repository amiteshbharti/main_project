<?php
ini_set("display_errors","1");
session_start();
class usertestController
{
	public function __construct()
	{
		if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
		{
			header("Location: index.php?controller=login&function=execute_process");
			//	exit();
		}
		if((empty($_SESSION['username']))){
			
			echo 'YOUR SESSION IS OUT .PLEASE LOGIN AGAIN.'; 	//message if session out
		header("location:index.php");
		}
	}

        public function startTest()
        {   
        	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        	{
        		header("Location: index.php?controller=login&function=execute_process");
        		//	exit();
        	} 
            $result     =   loadModel('usertest','startTest');
            loadView('starttest.php',$result);
        }
            
            
        public function testId()
        {    
        	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        	{
        		header("Location: index.php?controller=login&function=execute_process");
        		//	exit();
        	}
            $result     =   array();
          
	  //  print_r($_REQUEST);
	    $_SESSION['user_test']  =   $_REQUEST['testname'];
            $result =   loadModel('usertest','testId');
            loadView('testid.php',$result);
        }
        
        public function testStarted()
        {   
        	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        	{
        		header("Location: index.php?controller=login&function=execute_process");
        		//	exit();
        	}
//            print_r($_REQUEST);
	    $datas['temp_table_name']	=	$_REQUEST['val'];
	    $datas['qid']		=	$_REQUEST['qid'];
	    $datas['test_type']		=	$_REQUEST['test_type'];
	    $_SESSION['testname']	=	$datas['temp_table_name'];
	    $result			=	loadModel('usertest','startNewTest',$datas);
//	    $result			=	loadModel('usertest','insertDetails',$datas);
	    if($result== true)
	    {
	    	$result1			=	loadModel('usertest','insertDetails',$datas);
			if($result1=="done")
			{
				//echo "done";
				loadview('teststarted.php');
				
			}else
			{
				echo "not done";
			}
			
			
	    }
	}
	
	public function quessId()
	{
		print_r($_REQUEST);
	}
	

}

?>