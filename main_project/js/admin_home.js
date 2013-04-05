function personal_details()
	{
		
               				$("#admin_content").load('index.php?controller=personaldetails&function=check_details');
       	
	}

	function change_password()
	{
		
               				$("#admin_content").load('index.php?controller=changepassword&function=check_details');
       	
	}

	function list_user()
	{
		
               				$("#admin_content").load('index.php?controller=user_list&function=showList');
       	
	}

	function check_log()
	{
		
               				$("#admin_content").load('index.php?controller=user_list&function=logManage');
       	
	}
	/*function check_blog()
	{
		$(document).ready(function() {
               				$("#admin_content").load('manage_blog.php');
       				});
	}*/

	function manage_test()
	{
		
               				$("#admin_content").load('index.php?controller=managetest&function=loadOptions');
       	
	}

	function unsubscribe()
	{
		$("#admin_content").load('index.php?controller=managetest&function=unsubscribe');
//               				$("#admin_content").load('index.php?controller=managetest&function=unsubscribe');
		//alert("hi");
       	
	}


function validatechnagepassword()
		{
			 if(f1.txtoldpass.value =="")
				{
					alert("OLD PASSWORD CAN NOT LEFT EMPTY !");
					return false;
				}
			else if(f1.txtnewpass.value =="")
				{
					alert("NEW PASSWORD CAN NOT LEFT EMPTY !");
					return false;
				}
			else if(f1.txtretypepass.value =="")
				{
					alert("NEW PASSWORD CAN NOT LEFT EMPTY !");
					return false;
				}
			else if(f1.txtnewpass.value!=f1.txtretypepass.value)
				{
					alert("NEW PASSWORD FIELD AND RETYPE PASSWORD FIELD DOES NOT MATCH !");
					return false;
				}
			funcSearch();
		
					
		}
	
	function update_personal_details()
		{
			
               			$('#admin_content').load('index.php?controller=updatedetails&function=showDetails');
       		
		}
		
		
		function add_new_test()
		{
	
               				$("#manage_test").load('index.php?controller=managetest&function=addTest');
       	
		}
	
		function listing_test()
		{
	
               				$("#manage_test").load('index.php?controller=managetest&function=listingTest');
       		}
	function add_new_question()
		{
	
               				$("#manage_test").load('index.php?controller=managetest&function=addNewQuestion');
       	
		}
	
	function view_all_question()
		{
		
               				$("#manage_test").load('index.php?controller=managetest&function=viewAllQuestions');
		}