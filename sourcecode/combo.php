<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8"> 
		<meta name="description" content="HIV Regimen Generator possible combinations">
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
	
		<?php 

		
		$user = 'root';
		$pass = '';
		$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {
			$result = $pdo->query('SELECT * FROM `medications`');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
			
			?>			
			
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
		<form action="results.php" method="post">
			<fieldset>
				<legend> Possible Regimen Combinations </legend>
				<p>Select a medication combination to use from the following list of compatible regimen:</p>
				<div id="combo">
					<h3> Compatible Regimen: </h3>
					
					<p> <?php 
					
						$age= $_POST['years'];
						$tanner= $_POST['tanner-stage'];
						
						
						$arr = array();
						$i = 0;
						
						foreach ($result as $medication) {
									
							if ($medication['ageMin' ] < $age){
								
								if ($medication['ageMax'] > $age){
								
									if ($medication['tannerStage'] < $tanner){
										
										array_push($arr, $medication['Name']);
										echo '<span><input type="checkbox" name=',$medication['Name'],' value=',$medication['Name'],'> ',$medication['Name'],'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
										$i = $i + 1;
										echo ' ';
									}
								}
							}
							
						}
			
					?>
				</p>
				
				</div>
				
				<div id="submit-buttons">
						<input type="submit" value="Continue"> 
				</div>
			</fieldset>
		</form>
		
		<div id="return"> 
			<a href="main.html"> Return to Home </a>
		</div>
	</body>

</html>