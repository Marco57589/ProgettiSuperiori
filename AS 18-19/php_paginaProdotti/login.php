<!DOCTYPE html>
<html>
<body class="imgLogin" style="background-image: url('img/sfondoLogin.jpg');">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script><div class="row">	
<?php 
include 'dati.php';

$mailErr = $pswErr = "";
$email = $psw = "";
$errore=false;

session_start();

if (!$connessione) {
	echo "Connection failed: " . mysqli_connect_error();
}else{
	echo "connesso";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    $email = $_POST['email'];
    $psw = $_POST['Password'];
	$loggato=false;
    echo "<br>";	

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

	if($errore==false){		
		$sql= "SELECT mail,password,id FROM UTENTI WHERE mail='".$email."' AND password='".$psw."'";
		$result = mysqli_query($connessione, $sql);

		if (mysqli_num_rows($result)) {
			$result = mysqli_fetch_assoc($result);
			$iduser=$result['id'];
			$_SESSION['iduser']=$iduser;
			$_SESSION['carrello']="";
			header("refresh: 0; url=amazing.php");
		} else {
			$mailErr = "Mail errata";
			$pswErr = "Password errata";
		}
		alert("ERRORE SQL: ".$sql."<br>".$connessione->error);
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
	echo "<script type='text/javascript'>alert('$msg')</script>";
}
mysqli_close($connessione);
?>

<form method="POST" action="login.php">		
<div class="loginForm row">
<div class="col s4 offset-s4">	
	<div class="card waves-effect">
    	<div class="card-action blue accent-2-text">
      		<h2 class="center-align">Ciao!</h2>
		</div>				
    	<div class="card-content">		
			<div class="form-field">
				<label for="indirizzoemail">Email</label>
				<span class="errore"><?php echo $mailErr;?></span>
				<input type="email" id="indirizzoemail" class="in blue-text text-accent-2" name="email" value=<?php echo $email;?>>
			</div>
			<div class="form-field">	
				<label for="inserimentopsw">Password</label>	
				<span class="errore"><?php echo $pswErr;?></span>		
				<input type="password" id="inserimentopsw" class="in blue-text text-accent-2" name="Password" value=<?php echo $psw;?>>
			</div>
			<div class="form-field center-align">
				<input type="submit" class="waves-effect blue accent-2 btn" value="ACCEDI"></a>
				<a href="index.php" class="waves-effect blue accent-2 btn">HOME</a>
			</div>			
		</div>					
  	</div>
</div>
</div>
</form>	

<br>
</body>
</html>
