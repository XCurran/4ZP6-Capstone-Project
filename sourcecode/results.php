
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
			<b> Age: </b> <?php session_start(); echo $_SESSION['years'] ?>  Years and <?php echo $_SESSION['months']; ?> Months. <br>
			<b> BSA: </b> <?php echo $_SESSION['bsa']; ?> <br>
			<b> Weight: </b> <?php echo $_SESSION['weight']; ?> kilograms (kg)  &nbsp;&nbsp; <b> Height: </b> <?php echo $_SESSION['height']; ?> centimetres (cm) <br><br>
			<b> Tanner stage: </b> <?php echo $_SESSION['tanner-stage']; ?> &nbsp;&nbsp; <b> HLA status: </b> <?php echo $_SESSION['HLA-status']; ?> <br><br>
			<b> Medical Issues: </b> 
			
			<?php
				
				if (isset($_SESSION['med-issues'])) {
					echo $_SESSION['med-issues'];
				}
				
			?>
			
			
			
				
			<br><br>
			<b>Patient prefers medicine: </b>
			<b> Allergies: </b> n/a <br> <br>
			<b> Additional Notes: </b> n/a <br>
			
			
		</fieldset>
		<br>
		
		
		
		<h1> Patient's Selected Regimen: </h1>
		<?php 

		
		$user = 'root';
		$pass = '';
		$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			$result = $pdo->query('SELECT * FROM `medication_table`');
		} catch (PDOException $e) {
				echo $e->getMessage();
		} 

			?>		
			
	
		<?php
			
			
			
			foreach ($result as $Regimen) {
				
				if (isset($_POST[$Regimen['SName']])) {
					
					echo ('<h2>');
					echo $Regimen['Type'];
					echo ('</h2>');
					echo ('<fieldset id="pillone">');
					echo ('<legend>');
					echo $Regimen['Name'];
					echo ('</legend>');
					echo ('<br />');
					echo ('</fieldset>');
					}
			}				
			?>
		
		
		
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