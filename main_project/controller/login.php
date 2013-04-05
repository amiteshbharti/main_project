<?php
session_start();

ini_set("display_errors","1");

class loginController
{
    public function __construct()
    {
    	
      
       }

    public function execute_process()
    {

if(isset($_SESSION['start']))
{
loadview('header.php');
    echo "<center><h1 style='color:white;'>".$_SESSION['start']."</h1></center>";
unset($_SESSION['start']);
loadview('login.php');
}
/*	if($_SESSION['start']=='1')
	{
	unset($_SESSION['start']);
	loadview('header.php');
    echo "<center><h1 style='color:white;'>Username and Password dont match</h1></center>";
    loadview('login.php');
}elseif($_SESSION['start']=='2')
{
unset($_SESSION['start']);
	loadview('header.php');
    echo "<center><h1 style='color:white;'>You have Entered empty Username</h1></center>";
    loadview('login.php');

}elseif($_SESSION['start']=='3')
{
unset($_SESSION['start']);
	loadview('header.php');
    echo "<center><h1 style='color:white;'>You have Entered empty Password</h1></center>";
    loadview('login.php');

}elseif($_SESSION['start']=='4')
{
unset($_SESSION['start']);
	loadview('header.php');
    echo "<center><h1 style='color:white;'>Please Enter Username and Password</h1></center>";
    loadview('login.php');

}            
   }*/
   else
   {
	        loadview('header.php');
        loadview('login.php');
   }
    }
    

    public function about()
    {
    	loadView('about.php');
    }
    
    
    public function contact()
    {
    	loadView('contact_us.php');
    }
    
    public function check_details()
    {
    	//loadModel('login','setSessions');
    	//echo $_SESSION['username'];
    	//echo $_SESSION['password'];
      $a=  loadModel('login','check_session');
        $ab=loadModel('login','confirm_session');
        echo $_SESSION['username'];
        echo $_SESSION['password'];
        
        echo $ab;
        if($ab=="admin")
        {
       //	echo $_SESSION['username'];
          header("location: ".SITE_PATH."index.php?controller=adminhome&function=showlist");
        }
       else if($ab=="user")
        {
       //	echo $_SESSION['username'];
          header("location: ".SITE_PATH."index.php?controller=userhome&function=showlist");
        }
    }
    

}    
?>
