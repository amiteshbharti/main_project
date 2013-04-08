<?php
ini_set("display_errors","1");
session_start();
class certificationController
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
                public function userQuesAns()
                {
                    	$id="";
			if(isset($_REQUEST['id']))
			{
				$id	=	$_REQUEST['id'];
			}
                        $result =   loadModel('certification','userQuesAns',$id);
                        loadView('user_ques_ans.php',$result);
                }
		
	}
?>