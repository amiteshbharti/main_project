
	function personal_details()
	{
		
               				$("#admin_content").load('index.php?controller=personaldetails&function=check_details');
       	
	}

	function change_password()
	{
		
               				$("#admin_content").load('index.php?controller=changepassword&function=check_details');
       	
	}
	function start_test()
	{
		
               				$("#admin_content").load("index.php?controller=usertest&function=startTest");
       	
	}
	function resume_test()
	{
		
               				$("#admin_content").load('resume_test.php');
       	
	}
	function check_certifications()
	{
		
               				$("#admin_content").load('check_certifications.php');
     
	}
	function unsubscribe()
	{
		$("#admin_content").load('index.php?controller=managetest&function=unsubscribe');
//               				$("#admin_content").load('index.php?controller=managetest&function=unsubscribe');
		//alert("hi");
       	
	}
        
        function validate()
	{   
	if(window.document.form1.testname.value=="select")
                                {
                                alert("PLEASE SELECT CERTIFICATION !");
                                return false;
                                }
	}

                                
        /*function testId()
	{   
	      $("#admin_content").load('index.php?controller=managetest&function=unsubscribe');
        }*/
