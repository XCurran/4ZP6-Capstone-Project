

<!DOCTYPE html>
<html>
	<head>
	
		<meta charset="UTF-8"> 
		<meta name="description" content="HIV Regimen Generator possible combinations">
		<meta name="keywords" content="HIV, AIDS, gov, government, schedule, regimen, generator">
		<meta name="author" content="McMaster University Computer Science Capstone Team 14">
		<script type="text/javascript" src="comboscript.js"></script>

		
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
				<li class="headerli"> <a href="main.html"> Home </a> </li>
				<li class="headerli"> <a href="about.html"> About  </a> </li>
			
			</ul>
		</div>
		<p id="disclaimer"> *Disclaimer* None of the following information you provide will be stored. All details inputted will be removed immediately after you close the browser. </p>

		<!-- The combo page uses a check() Javascript function to see that the client has not accidentally chosen the same NRTI twice. This page then takes the user to the results page. -->
		
		<form onsubmit="return check()" action="results.php" method="post">
		
		<!--Session variables and used with a session so that the form variables and taken to the results page and can be displayed there. -->
		
		<?php
		

		session_start();
			$_SESSION['years'] = $_POST['years'];
			$_SESSION['months'] = $_POST['months'];
			$_SESSION['bsa'] = $_POST['bsa'];
			$_SESSION['weight'] = $_POST['weight'];
			$_SESSION['height'] = $_POST['height'];
			$_SESSION['tanner-stage'] = $_POST['tanner-stage'];
			$_SESSION['HLA-status'] = $_POST['HLA-status'];
			$_SESSION['other-allergies'] = $_POST['other-allergies'];
	
	
?>
			<fieldset>
				<legend> Possible Regimen Selections </legend>
				<div id="combo">
				
				<!--The following code uses an SQL table and grabs the necessary information related to the medication that users can combine. The NRTIs are selected by type,
				while the other medications are checked by name since they are not used for only one combination. Alternative regiments follow different guidelines so they
				may appear in more than one possible selection.-->
					<h3> Compatible Regimen: </h3>
					<!-- result1 is for nrti1
						 result2 is for nrti2
						 result3 is for the extra arv
						 result4, result5 and result6 is for the extra arv in an alternative regimen -->
					<p> <?php 
						$user = 'root';
						$pass = '';
						$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						try {
							$result = $pdo->query('SELECT * FROM `medication_table`');
							$result2 = $pdo->query('SELECT * FROM `medication_table`');
							$result3 = $pdo->query('SELECT * FROM `medication_table`');
							$result4 = $pdo->query('SELECT * FROM `medication_table`');
							$result5 = $pdo->query('SELECT * FROM `medication_table`');
							$result6 = $pdo->query('SELECT * FROM `medication_table`');
						} catch (PDOException $e) {
							echo $e->getMessage();
						}
						
						$agey= $_POST['years'];
						$agem= $_POST['months'];
						$tanner= $_POST['tanner-stage'];
						$weight= $_POST['weight'];
						
						echo'<b>CHOOSE THE FIRST NRTI</b>';
						echo'<br>';
						echo'<br>';
						
						foreach ($result as $arv) {
						
							if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
								if ($arv['SName'] == ('Abacavir')){
									echo '<span><input type="radio" id="',$arv['SName'],'" name="nrti1" value="',$arv['SName'],'" checked >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								else{
									echo '<span><input type="radio" id="',$arv['SName'],'" name="nrti1" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
							}		
						}
						echo'<b>CHOOSE THE SECOND NRTI</b>';
						echo'<br>';
						echo'<br>';
						
						foreach ($result2 as $arv) {
						
							if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
								if ($arv['SName'] == ('Didanosine')){
									echo '<span><input type="radio" id="',$arv['SName'],'1" name="nrti2" value="',$arv['SName'],'" checked >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								else{
									echo '<span><input type="radio" id="',$arv['SName'],'1" name="nrti2" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
							}		
						}
						if (($agey == 0 && $agem >= 0.5) || ($agey<2 && $agey>0)){
									
							
							echo'<b>AND</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result3 as $arv) {
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
										echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" checked >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
							}
							
							if (($agey == 0 && $agem > 0.5) || ($agey<2 && $agey>0)){
									
							
								echo'<b>ALTERNATIVE REGIMEN 1</b>';
								echo'<br>';
								echo'<br>';
								
								foreach ($result4 as $arv) {
									
									if ($arv['Name'] == ('Nevirapine (NVP, Viramune)')){
											echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
								}
							}
							
							if (($agey == 0 && $agem >= 1 && $weight >=3) || ($agey<2 && $agey>0 && $weight >=3)){
									
							
								echo'<b>ALTERNATIVE REGIMEN 2</b>';
								echo'<br>';
								echo'<br>';
								
								foreach ($result5 as $arv) {
									
									if ($arv['Name'] == ('Raltegravir (RAL, Isentress)')){
											echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
								}
							}
							
							if (($agey == 0 && $agem >= 3 && $weight >=10) || ($agey<2 && $agey>0 && $weight >=10)){
									
							
								echo'<b>ALTERNATIVE REGIMEN 3</b>';
								echo'<br>';
								echo'<br>';
								
								foreach ($result6 as $arv) {
									
									if ($arv['Name'] == ('Atazanavir (ATV, Reyataz)')){
											echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
								}
							}
							
						}
						
						else if (($agey == 2 && $agem >= 0) || ($agey<3 && $agey>2)){
							
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result3 as $arv) {
							
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" checked >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Raltegravir (RAL, Isentress)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							
							if (($agey == 2 && $agem >= 0) || ($agey<3 && $agey>2)){
									
							
								echo'<b>ALTERNATIVE REGIMEN 1</b>';
								echo'<br>';
								echo'<br>';
								
								foreach ($result4 as $arv) {
									
									if ($arv['Name'] == ('Nevirapine (NVP, Viramune)')){
											echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
											echo'<br>';
											echo'<br>';
										}
								}
							}
						}
						
						else if (($agey == 3 && $agem >= 0) || ($agey<12 && $agey>3)) {
							
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result3 as $arv) {
								
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
										
										echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" checked >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
									
								else if ($arv['Name'] == ('Raltegravir (RAL, Isentress)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Efavirenz (EFV, Sustiva)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Atazanavir (ATV, Reyataz)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Darunavir (DRV, Prezista)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'(twice daily)';
									echo'<br>';
									echo'<br>';
								}
								
							}
							
						}
						
						else if (($agey >= 12) && (($tanner == 1) || ($tanner == 2) || ($tanner == 3))) {
							
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result3 as $arv) {
								
								if ($arv['Name'] == ('Dolutegravir (DTG, Tivicay)')){
										
										echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" checked >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
									
								else if ($arv['Name'] == ('Elvitegravir (EVG, VITEKTA)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Darunavir (DRV, Prezista)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'(once daily)';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Atazanavir (ATV, Reyataz)')){
									
									echo '<span><input type="radio" name="extra" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
							}
							
							
						}
					?>  
				</p>
				

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