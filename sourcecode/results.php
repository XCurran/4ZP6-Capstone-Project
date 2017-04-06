
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
		<?php 

		
		$user = 'root';
		$pass = '';
		$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
				$sql = "SELECT `ID`, `Name`, `Description`, `ageMin`, `ageMax`, `weightMin`, `weightMax`, `tannerStage`, `renalDysfunction`, `osteoporosis`, `hepatitis`, `hypercholesterolemia`, `pregnancy`, `cholestasis`, `neuropsychiatric`, `insulinResistance`, `hyperglycemia`, `diabetes`, `medicationType`, `sideEffects`, `dosage`, `linkname`
				FROM `medications` WHERE `medications`.`ID` = ? OR `medications`.`ID` = ?  OR `medications`.`ID` = ?  OR `medications`.`ID` = ?" ;
				$result = $pdo->prepare($sql);
				$result->execute(array(1,7,8,10)); 
				$result = $result->fetchAll();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
			
			?>			
	
	
		<?php
			foreach ($result as $Regimen) {
				echo ('<h2>');
				echo $Regimen['medicationType'];
				echo ('</h2>');
				echo ('<fieldset id=pillone">');
				echo ('<legend>');
				echo $Regimen['Name'];
				echo ('</legend>');
				echo ('<b>Description: </b>');
				echo $Regimen['Description'];
				echo ('<br />');
				echo ('<b>Suggested dosage: </b>');	
				echo $Regimen['dosage'];
				echo ('<br />');
				echo ('<b>Potential side effects: </b>');	
				echo $Regimen['sideEffects'];
				echo ('<br />');
				echo ('<b>More information at: </b>');	
				echo ('<td><a href="https://www.drugs.com/cdi/'.$Regimen['linkname'].'.html"> https://www.drugs.com/cdi/'.$Regimen['linkname'].'.html </a></td>');
				echo ('<br />');
				echo ('</fieldset>');
				echo ('<br />');
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