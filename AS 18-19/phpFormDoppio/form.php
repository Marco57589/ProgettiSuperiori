
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style.css">
<center>
<h1>Login Page</h1>
<hr>

<?php
$utenti = array("vittuone.scuola@gmail.com"=>"ziopiero56", "giuseppepascoli@yahoo.net"=>"caneZoppo12", "jonnyPub5@email.ru"=>"12TritaCavi");



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $psw = $_POST['Password'];
    $loggato=false;
    echo "<br>";

    
    foreach($utenti as $n => $n_value){
        if($n_value==$psw && $n==$email){
            $loggato=true;
            echo "<p>Login avvenuto con successo</p><br>";
			header("refresh: 5; url = form.html"); 
        }   
    }
    if ($loggato == false) {
        echo "<p> Dati errati </p>";
        header("refresh: 3; url = form.html"); 
        exit;
    }

}
?>

<footer>

</footer>
   
</body>
</html> 