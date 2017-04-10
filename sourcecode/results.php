
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
				
				if ($_POST['nrti1'] == $Regimen['SName'] || $_POST['nrti2'] == $Regimen['SName'] || $_POST['extra'] == $Regimen['SName']) {
					
					echo ('<h2>');
					echo $Regimen['Type'];
					echo ('</h2>');
					echo ('<fieldset id="pillone">');
					echo ('<legend>');
					echo $Regimen['Name'];
					echo ('</legend>');
					
					if ($Regimen['Formulations']!= Null){
						echo ('<br />');
						echo '<b>Formulations</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Formulations'];
						}
						
					if ($Regimen['Fixed Dose Combination Tablets']!= Null){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Fixed Dose Combination Tablets</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Fixed Dose Combination Tablets'];
						}
						
					if ($Regimen['Treatment of HIV Infection']!= Null){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Treatment of HIV Infection</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Treatment of HIV Infection'];
						}
						
					if ($_SESSION['years'] >= 0.5 and $_SESSION['months'] < 3 and $_SESSION['years'] == 0){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Neonate (birth to <3 months)</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Neonate (birth to <3 months)'];
						}
						
					if ($_SESSION['months'] >= 3 and $_SESSION['months'] < 8 and $_SESSION['years'] == 0){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Infant (3 months to 8 months)</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Infant (3 months to 8 months)'];
						}
						
					if ( ($_SESSION['years'] == 0 and $_SESSION['months'] >= 8)	or ($_SESSION['years'] < 6 and $_SESSION['years'] > 0)){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Pediatric (8 months to 6 years old)</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Pediatric (8 months to 6 years old)'];
						}
						
					if ($_SESSION['years'] >= 6 and $_SESSION['years'] < 18){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Adolescent (6 years old - 17 years old)</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Adolescent (6 years old - 17 years old)'];
						}
					
					if ($_SESSION['years'] >= 18){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Adult (18 years old+)</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Adult (18 years old+)'];
						}
						
					if ($Regimen['Special Instructions']!= Null){
						echo '<br >'; 
						echo '<br >';
						echo '<br >'; 
						echo '<br >';
						echo '<b>Special Instructions</b>';
						echo '<br >'; 
						echo '<br >'; 
						echo $Regimen['Special Instructions'];
						}
					
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