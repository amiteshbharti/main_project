<?php

ini_set("display_errors","1");
session_start();

/**
* @classname            managetestController
* This class contain all methods that controls  the functionality to create a test and to add 
  and delete question to a particular test

* @package              Zend_Magic

* @author               Arpit Goyal
* @date                 26-03-2013
* @version              version - 2
* @modified-by          Amitesh Bharti
* @modification-date    26-03-2013
* ...
*/


class managetestController
{
    public function __construct()
    {
        if((empty($_SESSION['username']))){
	    header("location:index.php");
	}
    }

    public function loadOptions()
    {
        loadView('managetest.php');
    }
	
    public function addTest()
    {
        if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')){
	    header("Location: index.php?controller=login&function=execute_process");
	    //	exit();
	}
	    loadView('addtest.php');     
    }
	
    public function testAdded()
    {
        $a	=	$_REQUEST['txttablename'];
	$result	= loadModel('managetest','testAdded',$a);
	echo $result;
    }
    
    public function listingTest()
    {
        $a = loadModel('managetest','listingTest');
//	print_r($a);
	loadView('listingtest.php',$a);
       
    }
       
    public function changeStatus()
    {
//      print_r($_REQUEST);

	$test	=	array();
        $test['name']	=	$_REQUEST['name'];
        $test['value']	=	$_REQUEST['value'];
        $a		=	loadModel('managetest','changeStatus',$test);
//      print_r($a);
        if($a == 'ACTIVE'){
	    echo 'DISABLE';
		     	
        }else{
		 echo 'ACTIVE';
	}

//	echo $a;
		     
				   
//      header('location:'.SITE_PATH.'index.php?controller=managetest&function=listingTest');
			
		     
    }
		
    public function addNewQuestion()
    {
        $result	=	loadModel('managetest','addNewQuestion');
	loadView('addNewQuestion.php',$result);
    }
	
    public function questionAdded()
    {
//      print_r($_REQUEST);
	$questionAnswers['test']	=	$_REQUEST['testname'];
	$questionAnswers['question']	=	$_REQUEST['question'];
	$questionAnswers['A']		=	$_REQUEST['A'];
	$questionAnswers['B']		=	$_REQUEST['B'];
	$questionAnswers['C']		=	$_REQUEST['C'];
	$questionAnswers['D']		=	$_REQUEST['D'];
	$questionAnswers['ans']		=	$_REQUEST['ans'];
	      
	$result	= loadModel('managetest','questionAdded',$questionAnswers);
	      
	echo $result;
	      
    }
       
    public function viewAllQuestions()
    {
        $result	=	loadModel('managetest','viewAllQuestions');
	loadView('selecttest.php',$result);
    }
       
    public function questionsViewed()
    {
//      print_r ($_REQUEST);
	     
	$_SESSION['test']	=	$_REQUEST['testname'];
        header("location: ".SITE_PATH."index.php?controller=managetest&function=showQues");
    }
    public function showQues()
    {
	      
	$result 		=	loadModel('managetest','questionViewed');
//	print_r($result);
    }
       
    public function deleteQues()
    {
//      print_r($_REQUEST);
		
	$q_id	=	$_REQUEST['qid'];
	$result 		=	loadModel('managetest','deleteQues',$q_id);
		
	if($result=="done")
	{
	    header("location: ".SITE_PATH."index.php?controller=managetest&function=showQues");
	}
    }
    
    public function editQues()
    {
//      print_r($_REQUEST);
        $qid	=	$_REQUEST['qid'];
	$result	=	loadModel('managetest','editQues',$qid);
//      print_r($result);
        loadView('editques.php',$result);
		
    }
        
    public function quesUpdate()
    {
//	print_r($_REQUEST);
        $questionAnswers['qid']		=	$_REQUEST['qid'];
        $questionAnswers['question']	=	$_REQUEST['question'];
        $questionAnswers['A']		=	$_REQUEST['A'];
        $questionAnswers['B']		=	$_REQUEST['B'];
        $questionAnswers['C']		=	$_REQUEST['C'];
        $questionAnswers['D']		=	$_REQUEST['D'];
        $questionAnswers['ans']		=	$_REQUEST['ans'];
//      print_r($questionAnswers);
        $result	=	loadModel('managetest','quesUpdate',$questionAnswers);
        	
        if($result=="updated")
        {
            header("location: ".SITE_PATH."index.php?controller=managetest&function=showQues");
        }
        
        }
        
    public function unsubscribe()
    { 
//      echo "ji";
        loadView('unsubscribe.php');
    }
        
        
    public function manageUnsubsciption()
    {
//	print_r($_REQUEST);
       
       	$pass	=	$_REQUEST['pass'];
//	echo $pass;
       	
       	loadModel('managetest','manageUnsubsciption',$pass);
    }

}


?>
