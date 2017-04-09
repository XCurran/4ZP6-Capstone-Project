

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

		<form onsubmit="Sub()" action="results.php" method="post">
		<?php
		session_start();
    $_SESSION['years'] = $_POST['years'];
	$_SESSION['months'] = $_POST['months'];
	$_SESSION['bsa'] = $_POST['bsa'];
	$_SESSION['weight'] = $_POST['weight'];
	$_SESSION['height'] = $_POST['height'];
	$_SESSION['tanner-stage'] = $_POST['tanner-stage'];
	$_SESSION['HLA-status'] = $_POST['HLA-status'];
	$_SESSION['med-issues'] = $_POST['med-issues'];
	$_SESSION['allergies'] = $_POST['allergies'];
	$_SESSION['other-allergies'] = $_POST['other-allergies'];
	
	
?>
			<fieldset>
				<legend> Possible Regimen Selections </legend>
				<div id="combo">
					<h3> Compatible Regimen: </h3>
					
					<p> <?php 
						$user = 'root';
						$pass = '';
						$pdo = new PDO('mysql:host=localhost;dbname=medications', $user, $pass);//PDO access database
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						try {
							$result = $pdo->query('SELECT * FROM `medication_table`');
							$result2 = $pdo->query('SELECT * FROM `medication_table`');
						} catch (PDOException $e) {
							echo $e->getMessage();
						}
						
						$agey= $_POST['years'];
						$agem= $_POST['months'];
						$tanner= $_POST['tanner-stage'];
						
						$arr = array();
						
						if (($agey == 0 && $agem >= 0.5) || ($agey<2 and $agey>0)){
									
							echo'<b>CHOOSE TWO NRTIs</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result as $arv) {
							
								if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							
							echo'<b>AND</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result2 as $arv) {
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
										echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
							}
							
							echo '<div id="submit-buttons">';
								echo '<input type="submit" value="Continue">'; 
							echo '</div>';	
						}
						
						else if (($agey == 2 && $agem >= 0) || ($agey<3 and $agey>2)){
							echo'<b>CHOOSE TWO NRTIs</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result as $arv) {
							
								if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result2 as $arv) {
							
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Raltegravir (RAL, Isentress)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							echo '<div id="submit-buttons">';
								echo '<input type="submit" value="Continue">'; 
							echo '</div>';	
						}
						
						else if (($agey == 3 && $agem >= 0) || ($agey<12 and $agey>3)) {
							echo'<b>CHOOSE TWO NRTIs</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result as $arv) {
							
								if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result2 as $arv) {
								
								if ($arv['Name'] == ('Lopinavir/Ritonavir (LPV/r, Kaletra)')){
										
										echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
									
								else if ($arv['Name'] == ('Raltegravir (RAL, Isentress)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Efavirenz (EFV, Sustiva)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Atazanavir (ATV, Reyataz)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Darunavir (DRV, Prezista)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'(twice daily)';
									echo'<br>';
									echo'<br>';
								}
								
							}
							echo '<div id="submit-buttons">';
								echo '<input type="submit" value="Continue">'; 
							echo '</div>';	
							
						}
						
						else if (($agey >= 12) && (($tanner == 1) || ($tanner == 2) || ($tanner == 3))) {
							echo'<b>CHOOSE TWO NRTIs</b>';
							echo'<br>';
							echo'<br>';
							
							foreach ($result as $arv) {
							
								if ($arv['Type'] == ('NRTI' || 'NRTI (rare)')){
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}		
							}
							
							echo '<b>CHOOSE ONE</b>';
							echo '<br>';
							echo '<br>';
							
							foreach ($result2 as $arv) {
								
								if ($arv['Name'] == ('Dolutegravir (DTG, Tivicay)')){
										
										echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
										echo'<br>';
										echo'<br>';
									}
									
								else if ($arv['Name'] == ('Elvitegravir (EVG, VITEKTA)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Darunavir (DRV, Prezista)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'(once daily)';
									echo'<br>';
									echo'<br>';
								}
								
								else if ($arv['Name'] == ('Atazanavir (ATV, Reyataz)')){
									
									echo '<span><input type="checkbox" name="',$arv['SName'],'" value="',$arv['SName'],'" >',$arv['Name'],'';
									echo'<br>';
									echo'<br>';
								}
							}
							
							echo '<div id="submit-buttons">';
								echo '<input type="submit" value="Continue">'; 
							echo '</div>';	
						}
					?>  
				</p>
				

				
			</fieldset>
			
		</form>
		
		<div id="return"> 
			<a href="main.html"> Return to Home </a>
		</div>
	</body>

</html>