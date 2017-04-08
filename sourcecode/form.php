<?php session_start();?>

<!-- The information gathering page; the form -->
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
		<link type="text/css" rel="stylesheet" href="css/form.css"/>
		<link rel="icon" href="images/pill.png"> 
		
	</head>
	
	<body>
		<div id="banner">
			<img id="banner-img" src="images/logo.png" height="120" width="400" alt="HRG.org header banner">
		</div>
		
		<div id="header">
			<ul>
				<!--listing all the options on the header-->
				<li> <a href="main.html"> Home </a> </li>
				<li> About </li>
				<li> Contact Us </li>
			</ul>
		</div>
		
		<p id="disclaimer"> *Disclaimer* None of the following information you provide will be stored. All details inputted will be removed immediately after you close the browser. </p>
				
		<form action="combo.php" method="post">
			<fieldset>
				<legend> Patient Information </legend>
				<br>
				Age: <input type="number" name="years" placeholder="Years" min="0" max="100"> <input type="number" name="months" placeholder="Months" min="0" max="11.5" step=0.5 > </br></br>
				
				Height: <input type="number" id="height" name="height" placeholder="Centimetres (cm)" min="0" max="300"> &nbsp;&nbsp; Weight: <input type="number" id="weight" name="weight" placeholder="Kilograms (kg)" min="0" max="500"> &nbsp; <input type="button" onclick="updateBSA(document.getElementById('height').value, document.getElementById('weight').value);" value="Calculate BSA"> <br>
				
				BSA: <input type="number" id="bsa" name="bsa" step="0.0001"></br> 
				
				<span class="block1">Tanner stage: 
				<select name="tanner-stage">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
			    </select> </span>
				&nbsp;&nbsp;
				
				<span class="block1">HLA status: 
				<select name="HLA-status">
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="E">E</option>
					<option value="F">F</option>
					<option value="G">G</option>
					<option value="DP">DP</option>
					<option value="DQ">DQ</option>
					<option value="DR">DR</option>
			    </select></span> <br><br>
				
				Any baseline medical issues (check any/all that apply):<br>
				<span><input type="checkbox" name="med-issues" value="RenalDysfunction"> Renal dysfunction  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span><input type="checkbox" name="med-issues" value="Osteoporosis"> Osteoporosis or bone issues &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span><input type="checkbox" name="med-issues" value="Hepatitis"> Hepatitis </span><br>
				<span><input type="checkbox" name="med-issues" value="Hypercholesterolemia"> Hypercholesterolemia  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <span><input type="checkbox" name="med-issues" value="Pregnant"> Pregnant or risk of becoming pregnant &nbsp;&nbsp; </span> <span><input type="checkbox" name="med-issues" value="Cholestasis"> Cholestasis </span><br>
				<span><input type="checkbox" name="med-issues" value="Neuropsychiatric"> Neuropsychiatric issues   &nbsp;&nbsp; </span> <span><input type="checkbox" name="med-issues" value="InsulinRes"> Insulin resistance, hyperglycemia/diabetes </span> <br><br>
		
				Resistence(s):   
				<input list="resistences" id="list" name="resistence" placeholder="If applicable">
					<datalist id="resistences">
						<option value="med A">
						<option value="med B">
						<option value="med C">
						<option value="med D">
						<option value="med E">
					</datalist> <br> <br>
				
				What kind of medications can the patient take: <br>
				<input type="radio" name="medtype" value="suspension" checked> Suspension only <br>
				<input type="radio" name="medtype" value="pills"> Swallow Pills <br>
				<input type="radio" name="medtype" value="crushed"> Crush pills and mix with food <br><br>
				
				Allergies: <br>
				<input type="checkbox" name="allergies" value="med A"> med A <br>
				<input type="checkbox" name="allergies" value="med B"> med B <br>
				<input type="checkbox" name="allergies" value="med C"> med C <br><br>
				
				Other medical allergies: <br>
				<textarea name="other-allergies" placeholder="Specify any that applies." rows="5" cols="50"></textarea> <br><br>
				
				<div class="g-recaptcha" data-sitekey="6LensgsUAAAAADgvOT26Ha1bNEp1sPqkgPO76Had"></div> <br>
				
				<div id="submit-buttons">
						<input type="submit" value="Submit"> 
						<!--
						<button type="submit" style="border: 0; background: transparent">
							<img src="images/submit.png" width="150" height="50" alt="submit" onmouseover="this.src='../images/submit_hover.png'" onmouseout="this.src='images/submit.png'">
						</button> 
						
						 &nbsp;&nbsp; 
						<input type="reset" value="Reset">Reset</button>
						-->
				</div>
			</fieldset>
		</form>
		
		<div id="return"> 
			<a href="main.html"> Return to Home </a>
		</div>
		
		<!-- loading javascript -->
		<script src="javascript/form.js"> </script>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
	
</html>