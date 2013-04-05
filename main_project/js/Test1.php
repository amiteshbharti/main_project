<html>

<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

 $(document).click(function(){
 $("p").toggle();
 });


</script>
</head>

<body>
<p>If you click on me, I will disappear.</p>
<p style ="display:none"> hello</p>
</body>

</html>



function validate()
               {
                       
                       
                       valid=true;                        
                       if( $("#cat_name").val() == "")
                       {
                               //alert("Please  Fill Category");
                               $(".cat_name").html('Please Fill the category Name');
                               valid=false;        
                       }
                       
                       if($("#description").val()=="")
                       {
                               //alert("Please  Fill Category");
                               $(".description").html('Please give brief description');
                               valid=false;        
                       }
return valid;
                       
               }
