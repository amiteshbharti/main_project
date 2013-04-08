function update_details_js()
{

//CHECK NAMES BLANK
	if(f1.txtfname.value==""){
		alert("FIRST NAME FIELD IS EMPTY !");
		return false;
	} 
        else if( f1.txtfathername.value ==""){
		alert("FATHER NAME FIELD IS EMPTY !");
		return false;
        }
	else if( f1.txtlname.value==""){
		alert("LAST NAME FIELD IS EMPTY !");
		return false;
        }
        
        
        
        else if(f1.txtemailid.value ==""){
		alert("EMAIL FIELD IS EMPTY !");
		return false;
        }
        else if(f1.txtcontactnumber.value==""){
		alert("CONTACT NUMBER FIELD IS EMPTY !");
		return false;
        }
        else if(f1.txtstate.value ==""){
		alert("STATE FIELD IS EMPTY !");
		return false;
        }else if(f1.txtaddress.value ==""){
    		alert("ADDRESS FIELD IS EMPTY !");
    		return false;
            }
        else if(f1.txtpin.value ==""){
		alert("PIN NUMBER IS EMPTY !");
		return false;
        }else if(f1.txtdd.value == "" ){
        	alert(" PLEASE SELECT YEAR !");
        return false;
        }else if(f1.txtmm.value == "" ){
        	alert(" PLEASE SELECT MONTH !");
            return false;
            }else if(f1.txtyyyy.value == "" ){
            	alert(" PLEASE SELECT DAY !");
                return false;
                }
            else if(f1.txtcountry.value ==""){
        		alert("COUNTRY FIELD IS EMPTY !");
        		return false;
                
            }
//CHECK SPACE IN FIELDS		
	if(f1.txtfname.value.trim() =="" || f1.txtfathername.value.trim() =="" || f1.txtlname.value.trim() ==" " 
		||f1.txtemailid.value.trim() =="" ||f1.txtcontactnumber.value.trim() =="" ||f1.txtstate.value.trim() =="" ||f1.txtpin.value =="")
		{
			alert("SORRY ! YOU CAN'T USE SPACE.");
			return false;
		}		
		
//MATCH PASSWORD AND RETYPE PASSWORD		
//	if(f1.txtpassword.value != f1.txtretypepassword.value)
//		{
//			alert(" PASSWORD & RETYPE PASSWORD DOESN'T  MATCH !");
//			return false;
//		}
	
//CHECK DATE OF BIRTH	
//	if(f1.txtdd.value == "" || f1.txtmm.value == "" || f1.txtyyyy.value == "")
//		{
//			alert(" PLEASE SELECT DATE OF BIRTH !");
//			return false;
//		}

//CHECK FEB MONTH		
	if((f1.txtdd.value ==29 || f1.txtdd.value == 30 || f1.txtdd.value == 31) && f1.txtmm.value == 2 )
		{
			alert(" PLEASE SELECT VALID DATE FOR FEB MONTH !");
			return false;
		}	

//CHECK APRIL,JUNE,AUGUST,NOVEMBER MONTHS		
	if(f1.txtdd.value ==31 && (f1.txtmm.value == 4 || f1.txtmm.value == 6 || f1.txtmm.value == 8 || f1.txtmm.value == 11))
		{
			alert(" PLEASE SELECT VALID DATE FOR THAT 30 DAY'S MONTH !");
			return false;
		}	
				
//CHECK COUNTRY				
	if(f1.txtcountry.value == "Select Country")
		{
			alert(" PLEASE SELECT COUNTRY !");
			return false;
		}

//CHECK LENGTH OF USER NAME
//	x=new String;
//	x=window.document.f1.txtuname.value;
//	l=x.length;
//	if((l<5) || (l>15))
//	{
//		alert("USER NAME MUST BE BETWEEN 5 TO 15 CHARACTER");
//		return false;
//	}
	
//CHECK LENGTH OF PASSWORD
//	x=new String;
//	x=window.document.f1.txtpassword.value;
//	l=x.length;
//	if((l<3) || (l>12))
//	{
//		alert("PASSWORD MUST BE BETWEEN 3 TO 12 CHARACTER");
//		return false;
//	}
	
//CHECK VALID EMAIL ID
	x=new String;
	x=window.document.f1.txtemailid.value;
	counter=0;
	l=x.length;
	firstchar=x.charAt(0);
	lastchar=x.charAt(l-1);
	if(firstchar=='@' || lastchar=='@')
	{
		alert("INVALID EMAIL ID : first or last character in email is @");
		return false;
	}

	if(firstchar=='.' || lastchar=='.')
	{
		alert("INVALID EMAIL ID : first or last character in email is .");
		return false;
	}

	for(i=0;i<l;i++)
	{
		if(x.charAt(i)=='@')
		{
			counter++;
		}	
	}
	if(counter!=1)
	{
		alert("Invalid email Id : contains zero or more than one @ Symbols");
		return false;
	}

	counter=0;
	for(i=0;i<l;i++)
	{
		if(x.charAt(i)=='.')
		{
			counter++;
		}	
	}

	if(counter<1)
	{
		alert("Invalid email Id : At least one dot must be there in Email field");
		return false;
	}
	
//CHECK VALID  CONTACT NUMBER 

	x=window.document.f1.txtcontactnumber.value;
	counter=0;
	l=x.length;
	
	if(l<10)
	{
		alert("CONTACT NUMBER MUST HAVE AT LEAST 10 DIGIT");
		return false;
	}

	for(i=0;i<l;i++)
	{
		if(!isNaN(x.charAt(i))==false)
		{
			alert("you have entered Non Numeric value in contact number field");
			return false;
		
		}
	}
	
//CHECK VALID  PIN  NUMBER 
	x=window.document.f1.txtpin.value;
	counter=0;
	l=x.length;
	
	if(l != 6)
	{
		alert("PIN NUMBER MUST HAVE 6 DIGIT");
		return false;
	}
	
	for(i=0;i<l;i++)
	{
		if(!isNaN(x.charAt(i))==false)
		{
			alert("you have entered Non Numeric value in Pin field");
			return false;
		
		}
	}


//CHECK VALID  First Name 
	x=window.document.f1.txtfname.value;
	counter=0;
	l=x.length;
	
	for(i=0;i<l;i++)
	{
		if(isNaN(x.charAt(i))==false && x.charAt(i)!=" ")
		{
			alert("you have entered Numeric value in First name field");
			return false;
		
		}
	}


//CHECK VALID  Fathers Name 
	x=window.document.f1.txtfathername.value;
	counter=0;
	l=x.length;
	
	for(i=0;i<l;i++)
	{
		if(isNaN(x.charAt(i))==false && x.charAt(i)!=" ")
		{
			alert("you have entered Numeric value in Fathers name field");
			return false;
		
		}
	}

//CHECK VALID  Last Name 
	x=window.document.f1.txtlname.value;
	counter=0;
	l=x.length;
	
	for(i=0;i<l;i++)
	{
		if(isNaN(x.charAt(i))==false)
		{
			alert("you have entered Numeric value in Last name field");
			return false;
		
		}
	}
	funcSearch();

}







function validatePassword_js()
{
    //alert(fdsfs');
	if(f1.txtoldpass.value ==""  )
	{
			alert("OLD PASSWORD FIELD IS EMPTY !");
			return false;
	        }
        else if(f1.txtnewpass.value =="" )
	{
			alert("NEW PASSWORD FIELD IS EMPTY !");
			return false;
		}
	 else if(f1.txtretypepass.value ==""  )
	{
			alert("RETYPE PASSWORD FIELD IS EMPTY !");
			return false;
		}
         

	if(f1.txtnewpass.value.trim() =="" ||f1.txtretypepass.value.trim() =="")
	{
			alert("SORRY ! YOU CAN'T USE SPACE.");
			return false;
		}
   
   
	//CHECK LENGTH OF PASSWORD
	x=new String;
	x=window.document.f1.txtnewpass.value;
	l=x.length;
	if((l<5) || (l>12))
	{
		alert("PASSWORD MUST BE BETWEEN 5 TO 12 CHARACTER");
		return false;
	}		
		
	


//MATCH PASSWORD AND RETYPE PASSWORD		
	if(f1.txtnewpass.value != f1.txtretypepass.value)
		{
			alert(" PASSWORD & RETYPE PASSWORD DOESN'T  MATCH !");
			return false;
		}
		


        updatePassword_ajax();
        
}


