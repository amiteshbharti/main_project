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
        	} 
            $result     =   loadModel('usertest','startTest');
            loadView('starttest.php',$result);
        }
            
            
        public function testId()
        {    
        	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        	{
        		header("Location: index.php?controller=login&function=execute_process");
        	}
            $result     =   array();
          
	    $_SESSION['user_test']  =   $_REQUEST['testname'];
            $result =   loadModel('usertest','testId');
            loadView('testid.php',$result);
        }
        
        public function testStarted()
        {   
        	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
        	{
        		header("Location: index.php?controller=login&function=execute_process");
        	}
	    $datas['temp_table_name']	=	$_REQUEST['val'];
	    $datas['qid']		=	$_REQUEST['qid'];
	    $datas['test_type']		=	$_REQUEST['test_type'];
	    $_SESSION['testname']	=	$datas['temp_table_name'];
	    $result			=	loadModel('usertest','startNewTest',$datas);

	    if($result== true)
	    {
	    	$result1			=	loadModel('usertest','insertDetails',$datas);
			if($result1=="done")
			{
			header("location:".SITE_PATH."index.php?controller=usertest&function=quessId");	
			}else
			{
				echo "not done";
			}
			
			
	    }
	}
	
	public function quessId()
	{ ?><script>var num=setTimeout(function() {getCalc(1)}, 20*60*10000);
	</script>
	<?php
		include VIEW_PATH.'timer.php';
		if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}
	
	
		$aray	=	array();
	$qid	=	1;
	if(isset($_REQUEST['qid']))
	{
		if($_REQUEST['qid']<=0)
		{
			$aray['qid']	=	1;
		}elseif($_REQUEST['qid']>=21)
		{
			$aray['qid']	=	20;
		}else{
			
		
		$aray['qid']	=	$_REQUEST['qid'];
		}
		
	}
	$result				=	loadModel('usertest','testQuestions',$qid);
	
	loadView('testquestions.php',$result);
	}

	public function nextQues()
	{
		if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}
		$aray	=	array();
		$aray['R1']	=	$_REQUEST['R1'];
		if(isset($_REQUEST['qid']))
		{
			if($_REQUEST['qid']<=0)
			{
				$aray['qid']	=	1;
			}elseif($_REQUEST['qid']>=21)
			{
				$aray['qid']	=	21;
			}else{
					
		
				$aray['qid']	=	$_REQUEST['qid'];
			}
		
		}
		$result				=	loadModel('usertest','nextQues',$aray);
		
		loadView('testquestions.php',$result);
		
	}
	
	public function previousQues()
	{
		if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}
		$aray	=	array();
		$aray['R1']	=	$_REQUEST['R1'];
		if(isset($_REQUEST['qid']))
		{
			if($_REQUEST['qid']<=0)
			{
				$aray['qid']	=	1;
			}elseif($_REQUEST['qid']>=21)
			{
				$aray['qid']	=	21;
			}else{
					
		
				$aray['qid']	=	$_REQUEST['qid'];
			}
		
		}
		$result				=	loadModel('usertest','previousQues',$aray);
		
		loadView('testquestions.php',$result);
		
	}
	
	public function updateLast()
	{
					
		$aray['R1']	=	$_REQUEST['R1'];
 				$aray['qid'] =	21;
		$result				=	loadModel('usertest','updateLast',$aray);
		header("location:".SITE_PATH."index.php?controller=usertest&function=seeLast");	
	}
	
	public function seeLast()
	{
						if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}

		$last		=	20;
		$result		=	loadModel('usertest','seeLast',$last);
		loadView('testquestions.php',$result);
	}
	
	
	public function getCalc()
	{
				if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}
	
		
		$aray['qid']	=	$_REQUEST['qid'];
		$aray['R1']	=	$_REQUEST['R1'];
		$score	=	loadModel('usertest','getcalc',$aray);
	
		if($score==true)
		{
			header('location: index.php?controller=usertest&function=calResult');
		}
	}
	
	public function calResult()
	{
						if((empty($_SESSION['testname']))){
			header("Location: index.php?controller=userhome&function=loadUserHome");
		}
		
		$score	=	loadModel('usertest','calResult');
		$result	=	loadModel('usertest','updateCertificate',$score);
		$drop 	=	loadModel('usertest','insertResultDetails');
		if($drop==true)
		{
			$id	=	$_SESSION['testname'];
			header("location: index.php?controller=usertest&function=showResult&id=".$id);
		}
	}
		public function showResult()
		{
			$id="";
			if(isset($_REQUEST['id']))
			{
				$id	=	$_REQUEST['id'];
			}else{
		//		header("Location: index.php?controller=userhome&function=loadUserHome");
		echo "no id";	}
		$cert	=	loadModel('usertest','showResult',$id);
		loadView('certificate.php',$cert);
		unset($_SESSION['testname']);
	}
	
	
	public function checkCertification()
	{
		loadView('check_certification.php');
	}
	
}

?>
