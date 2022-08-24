<!DOCTYPE html>
<html>
<body class="imgLogin" style="background-image: url('img/sfondoRegister.jpg');">
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script><div class="row">	

<?php 
$statoDB = "";
$log = "";
$mailErr = $pswErr = $userErr = $teleErr = $sessoErr = "";
$email = $psw = $user = $telefono = $sesso = "";
$errore=false;

include 'dati.php';

if(!$connessione){ 
	$statoDB=("<b><p style='color:red'> Connection failed ".connect_error."</p></b>");
}else{
	$statoDB="<b><p style='color:green'>Connesso a: /".$dbname."/</p></b>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {	

	if (empty($_POST["email"])) {
		$mailErr = "*email errata";
		$errore=true;
	} else {
		$email = controllo_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$mailErr = "Formato email errato";
			$errore=true;
		}
	}
	  
	if (empty($_POST["Password"])) {
		$pswErr = "*Inserisci la password";
		$errore=true;
	} else {
		$psw = controllo_input($_POST["Password"]);
		if (!preg_match("/^[a-zA-Z0-9]*$/",$psw)) {
			$pswErr = "Formato password errato";
			$errore=true;
		}
	}
		
	if (empty($_POST["Username"])) {
		$userErr = "*Inserisci l'username";
		$errore=true;
	} else {
		$user = controllo_input($_POST["Username"]);
		if (!preg_match("/^[a-zA-Z]*$/",$user)) {
			$userErr = "Formato username non valido";
			$errore=true;
		}
	}
	
	if (empty($_POST["Telefono"])) {
		$teleErr = "";
	} else {	
		$telefono = controllo_input($_POST["Telefono"]);	
		if (!preg_match("/^[0-9]*$/",$telefono)) {
			$teleErr = "Formato telefono non valido";
			$errore=true;
		}		
	}
	
	if (empty($_POST["Sesso"])) {
		$sessoErr = "*Seleziona il sesso";
		$errore=true;
	} else {
		$sesso = controllo_input($_POST["Sesso"]);
	}

	if($errore==false){		
		$sql = "INSERT INTO UTENTI (username,mail,password,telefono,sesso) VALUES ('$user','$email','$psw','$telefono','$sesso')";
		if ($connessione->query($sql) === TRUE) {
			header("refresh: 0; url=index.php");
		}else{
			alert("ERRORE SQL: ".$sql."<br>".$connessione->error);
		}
		$email = $psw = $user = $telefono = $sesso = "";		
	}
    echo "<br>";			
}

function controllo_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function alert($msg){
	echo "<script type='text/javascript'>alert('.$msg.')</script>";
}
mysqli_close($connessione);
?>

<form method="POST" action="registrazione.php">		
<div class="loginForm row">
<div class="col s4 offset-s4">	
	<div class="card waves-effect">
    	<div class="card-action blue accent-2-text">
      		<h2 class="center-align">Ciao!</h2>
		</div>				
    	<div class="card-content">		
			<div class="form-field">
				<label for="indirizzoemail">Email*</label>
				<span class="errore"><?php echo $mailErr;?></span>
				<input type="email" id="indirizzoemail" class="in blue-text text-accent-2" name="email" value=<?php echo $email;?>>
			</div>		
			<div class="form-field">	
				<label for="inserimentoUsername">Username*</label>	
				<span class="errore"><?php echo $userErr;?></span>		
				<input type="text" id="inserimentoUsername" class="in blue-text text-accent-2" name="Username" value=<?php echo $user;?>>
			</div>
			<div class="form-field">
				<label for="inspassword">Password*</label>
				<span class="errore"><?php echo $pswErr;?></span>
				<input type="password" id="inspassword" class="in blue-text text-accent-2" name="Password" value=<?php echo $psw;?>>
			</div>
			<div class="form-field">
				<label for="numtelefono">Telefono</label>
				<span class="errore"><?php echo $teleErr;?></span>
				<input type="text" id="numtelefono" class="in blue-text text-accent-2" name="Telefono" value=<?php echo $telefono;?>>
			</div>
			<p>
      			<label><input class="blue accent-2" name="Sesso" type="radio"><span>Donna</span></label>    		
      			<label><input name="Sesso" type="radio"><span>Uomo</span></label>			
				<label><input name="Sesso" type="radio"><span>Altro</span></label>
				<span class="errore"><?php echo $sessoErr;?></span>
			</p><br>
			
			<div class="form-field center-align">
				 <input type="submit" class="waves-effect blue accent-2 btn" value="REGISTRATI"></a>
				 <a href="index.php" class="waves-effect blue accent-2 btn" >HOME</a>
			</div>			
		</div>					
  	</div>
</div>
</div>
</form>	
</body>
</html>
