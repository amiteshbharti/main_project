<?php 
if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == ''))
{
	header("Location: index.php?controller=login&function=execute_process");
	//	exit();
}

?>


<?php
	include_once("header.php");
?>
<html>
	<head>
		<title>
			Contact us
		</title>
	</head>
	<body>
				<div class="login_main2" ><br>
						<center><b>----CONTACT US----</b></center>
						<div>
							<center><br>
							<table width="90%" height="60%" border="2px solid" >
								<tr height="10%" style="background-color:#C0C0C0;">
									<th width="15%"><p align="center">Office
									</th>
									<th width="30%"><p align="center">Address
									</th>
									<th width="17%"><p align="center">Phone
									</th>
									<th width="37%"><p align="center">E-mail
									</th>
								</tr>
								<tr height="22%">
									<td width="15%" valign="top"><p align="justify"><b>Head Quarter</b>
									</td>
									<td width="30%" class="login_matter" valign="top"><p align="justify">OSSCube UK<br>Devonshire House 582, Honeypot Lane<br>London, HA7 1JS 
									</td>
									<td width="17%" class="login_matter" valign="top"><p align="left">+44(0)845 834 0309
									</td>
									<td width="37%" class="login_matter" valign="top"><p align="justfy"> info@osscube.com
									</td>
								</tr>
								<tr height="22%">
									<td width="15%" valign="top"><p align="justify"><b>Branch Office</b>
									</td>
									<td width="30%" class="login_matter" valign="top"><p align="justify">OSSCube Solutions Pvt Ltd<br>Suite # 512, 4th Floor, Oxford Towers<br>Bangalore (KA) - 560008 
									</td>
									<td width="17%" class="login_matter" valign="top"><p align="left">+91-120-4740700
									</td>
									<td width="37%" class="login_matter" valign="top"><p align="justfy"> info@osscube.com
									</td>
								</tr>
								<tr height="22%">
									<td width="15%" valign="top"><p align="justify"><b>Branch Office</b>
									</td>
									<td width="30%" class="login_matter" valign="top"><p align="justify">OSSCube Solutions Pvt Ltd<br>D-49, Sector 63<br>NOIDA (UP) - 201301 
									</td>
									<td width="17%" class="login_matter" valign="top"><p align="left">+91-120-4740700
									</td>
									<td width="37%" class="login_matter" valign="top"><p align="justfy"> info@osscube.com
									</td>
								</tr>
								<tr height="22%">
									<td width="15%" valign="top"><p align="justify"><b>Manager</b>
									</td>
									<td width="30%" class="login_matter" valign="top"><p align="justify">OSSCube Solutions Pvt Ltd<br>D-49, Sector 63<br>NOIDA (UP) - 201301 
									</td>
									<td width="17%" class="login_matter" valign="top"><p align="left">+91-9716814743
									</td>
									<td width="37%" class="login_matter" valign="top"><p align="justfy"> mohit@osscube.com
									</td>
								</tr>
								
							</table>		
							</center>					
						</div>
						<div style="background: url('images/footer-fade.jpg') repeat scroll center bottom;width:100%;height:20%;">
						</div>
	</body>
</html>
