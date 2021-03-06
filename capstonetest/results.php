
<!-- The results page -->
<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8"> 
		<meta name="description" content="HIV Regimen Generator form">
		<meta name="keywords" content="HIV, AIDS, gov, government, schedule, regimen, generator">
		<meta name="author" content="McMaster University Computer Science Capstone Team 14">
		
		<!-- auto scales on phones -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		
		<!-- defining browser details and linking to css-->
		<title> HRV.org </title>
		<link type="text/css" rel="stylesheet" href="css/results.css"/>
		<link rel="icon" href="images/pill.png"> 
		
	</head>
	
	<body>
		<div id="banner">
			<img id="banner-img" src="images/logo.png" height="120" width="400" alt="HRG.org header banner">
		</div>
		
		<div id="header">
			<ul id="headerul">
				<!--listing all the options on the header-->
				<li class="headerli"> <a href="main.html"> Home </a> </li>
				<li class="headerli"> About </li>
				<li class="headerli"> Contact Us </li>
			</ul>
		</div>
		
		<br>
		<fieldset id="patinfo">
			<legend> Patient Information </legend>
			<b> Age: </b> <?php echo $_POST['years']; ?>  Years and <?php echo $_POST['months']; ?> Months. <br>
			<b> BSA: </b> <?php echo $_POST['bsa']; ?> <br>
			<b> Weight: </b> <?php echo $_POST['weight']; ?> kilograms (kg)  &nbsp;&nbsp; <b> Height: </b> <?php echo $_POST['height']; ?> centimetres (cm) <br><br>
			<b> Tanner stage: </b> <?php echo $_POST['tanner-stage']; ?> &nbsp;&nbsp; <b> HLA status: </b> <?php echo $_POST['HLA-status']; ?> <br><br>
			<b> Medical Issues: </b> 
			<?php
				
				if (isset($_POST['med-issues'])) {
					echo $_POST['med-issues'];
				}
				
			?>
			
			
			
				
			<br><br>
			<b>Patient prefers medicine: </b> Suspension only <br><br>
			<b> Allergies: </b> n/a <br> <br>
			<b> Additional Notes: </b> n/a <br>
		</fieldset>
		<br>
		
		<h1> Patient's Selected Regimen: </h1>
		
		<h2> NRTIs </h2>
		<fieldset id="pillone">
			<legend> Zidovudine </legend>
			<b> Description: </b> Treating HIV infection when used along with other medicines. It is also used with other medicines to help prevent women from passing the HIV virus to the fetus during pregnancy. Zidovudine is an antiviral. It works by blocking the reproduction of the HIV virus. <br><br>
			<b> Suggested dosage: </b> Once per day. <br><br>
			<b> Potential side effects: </b> Headache, nausea, neutropenia, vomiting, anemia, anorexia, and malaise. <br><br>
			More information at: <a href="https://www.drugs.com/cdi/zidovudine.html"> https://www.drugs.com/cdi/zidovudine.html </a>
		</fieldset> <br>
		
		<fieldset id="pilltwo">
			<legend> Abacavir </legend>
			<b> Description: </b> Treating HIV infection with other medications. Abacavir is a nucleoside analog reverse transcriptase inhibitor (NRTI). It works by slowing down the growth of HIV, the virus that causes AIDS. <br><br>
			<b> Suggested dosage: </b> Twice per day. <br><br>
			<b> Potential side effects: </b> Arthralgia, cough, fatigue, lethargy, myalgia, pruritus, vomiting, chills, and malaise <br><br>
			More information at: <a href="https://www.drugs.com/cdi/abacavir.html"> https://www.drugs.com/cdi/abacavir.html </a>
		</fieldset> 
		
		<h2> LPV/r </h2>
		<fieldset id="pillthree">
			<legend> Lopinivir </legend>
			<b> Description: </b> Treating HIV infection. It is used along with other medicines for HIV. Lopinavir/ritonavir is a combination of 2 HIV protease inhibitors. It works by stopping the HIV virus from multiplying. <br><br>
			<b> Suggested dosage: </b> Twice per day. <br><br>
			<b> Potential side effects: </b> Increased serum cholesterol and increased serum triglycerides. <br><br>
			More information at: <a href="https://www.drugs.com/cdi/lopinavir-and-ritonavir.html"> https://www.drugs.com/cdi/lopinavir-and-ritonavir.html </a>
		</fieldset>
		
		<a href="javascript:window.print()">
			<div id="print">
				 Print 
			</div>
		</a>
		
		<div id="return"> 
			<a href="main.html"> Return to Home </a>
		</div>
	</body>

</html>