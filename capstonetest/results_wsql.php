
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
			<legend> 
				<?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Name FROM medications WHERE id=7";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?>
			 </legend>
			<b> Description: </b> 
							<?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Description FROM medications WHERE id=7";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Suggested dosage: </b> 
							<?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT dosage FROM medications WHERE id=7";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Potential side effects: </b> 

				<?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT sideEffects FROM medications WHERE id=7";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			More information at: <a href="https://www.drugs.com/cdi/zidovudine.html"> https://www.drugs.com/cdi/zidovudine.html </a>
		</fieldset> <br>
		
		<fieldset id="pilltwo">
			<legend> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Name FROM medications WHERE id=8";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> </legend>
			<b> Description: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Description FROM medications WHERE id=8";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Suggested dosage: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT dosage FROM medications WHERE id=8";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Potential side effects: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT sideEffects FROM medications WHERE id=8";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			More information at: <a href="https://www.drugs.com/cdi/abacavir.html"> https://www.drugs.com/cdi/abacavir.html </a>
		</fieldset> 
		
		<h2> LPV/r </h2>
		<fieldset id="pillthree">
			<legend> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Name FROM medications WHERE id=10";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> </legend>
			<b> Description: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT Description FROM medications WHERE id=10";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Suggested dosage: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT dosage FROM medications WHERE id=10";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
			<b> Potential side effects: </b> <?php
				$user = 'root';
				$pass = '';
				$db = 'hiv_meds';
				$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

				$sql = "SELECT sideEffects FROM medications WHERE id=10";
				$result = $conn->query($sql);
				$row = $result->fetch_array(MYSQL_BOTH);
				echo $row[0];

				$conn->close();

				?> <br><br>
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