<!DOCTYPE html>
<html>

<body>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <nav class="waves-effect">
        <div class="nav-wrapper blue lighten-2">
            <a class="brand-logo" style="margin-left:5%">Amazing</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="amazing.php">Negozio</a></li>                
                <li><form method='POST'><button type='submit' name='submit' class="waves-effect blue accent-2 btn value='2'">Procedi All'ordine</button></form></li>
                <li><a href="index.php" class="waves-effect blue accent-2 btn">LOG-OUT</a></li>
            </ul>
        </div>
    </nav>

    <div class="row" style="margin-bottom: 0px;">
        <div class="col s6 m2 l2 blue lighten-2 full-width">
        </div>
        <div class="col s12 m8 l9 full-width ">

    <?php
        include 'dati.php';
        $row = 0;

        session_start();
        $idUser = $_SESSION["iduser"];     

        if ($idUser == null) {
            header("refresh: 0; url=index.php");
        }     

        $data = date('Y/m/d');
        $idUtente=$_SESSION['iduser'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {	
            
            if(($_POST['submit']==1)){
                $rimuovi=$_POST['dati'];  
                $_SESSION['carrello']=str_replace($rimuovi,'',$_SESSION['carrello']);
            }else{
                $sql = "INSERT INTO ordine (DataOrdine,idUtente) VALUES ('$data','$idUtente')";    
                if(mysqli_query($connessione, $sql)){
                    $sql = "SELECT MAX(numOrdine) AS numOrdine FROM ORDINE WHERE idUtente='" . $idUtente . "'";  
                    $result = mysqli_query($connessione, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);   
                        $i =  stripos($_SESSION['carrello'],'#');    
                        while($i){

                            $idArticolo=substr($_SESSION['carrello'],0,$i);
                            $_SESSION['carrello']=substr($_SESSION['carrello'],$i+1);
                            $i = stripos($_SESSION['carrello'],'_');
                            $quantita= substr($_SESSION['carrello'],0,$i);
                            $_SESSION['carrello']=substr($_SESSION['carrello'],$i+1);
                            $i = stripos($_SESSION['carrello'],'#');

                            $sql = "INSERT INTO dettagliOrdini (numOrdine,idArt,quantita) VALUES ('$row[numOrdine]','$idArticolo','$quantita')";
                            mysqli_query($connessione, $sql);  
                        }
                        $_SESSION['carrello']="";
                    }
                } else {
                    alert("ERRORE SQL: ".$sql."<br>". mysqli_error($connessione));
                }          
            }            
        }
        $aus = $_SESSION['carrello'];
        $i =  stripos($aus,'#');
        while($i){  
            
            $idArticolo=substr($aus,0,$i);
            $aus=substr($aus,$i+1);
            $i = stripos($aus,'_');
            $quantita= substr($aus,0,$i);
            $aus=substr($aus,$i+1);
            $i = stripos($aus,'#');
            
            $sql = 
            "SELECT art.descrizione,art.Foto,art.Prezzo 
            FROM Articoli art 
            WHERE idArt='$idArticolo'
            ";
            
            $result = mysqli_query($connessione, $sql);
            $row = mysqli_fetch_assoc($result);

            $prezzo=$row['Prezzo'];
            $prezzo *= $quantita;
            $oggetto=$idArticolo.'#'.$quantita.'_';
            $printArticolo = "      
            <div class='col m3 s4'>
                <div class='card'>        
                    <div class='card-image'>
                        <img class='materialboxed' width='75' height='200' src='img/articoli/$row[Foto].jpg';                                        
                        <span class='card-title left-align'></span>                
                    </div>
                    <div class='card-content'>
                        <p>$row[descrizione]</p>
                        <p>Quantità: $quantita</p>       
                        <p>Prezzo: $row[Prezzo] €</p>                             
                        <p>Totale: $prezzo €</p>
                    </div>
                    <div class='card-action'>      
                        <form method='POST'>      
                        <input id='dati' name='dati' type='text' value='$oggetto' style='display:none;'></input>              
                            <button type='submit'name=submit class='waves-effect blue accent-2 btn' value='1'>Rimuovi<i class='material-icons right'>remove</i></button>  
                        </form>                                                                                             
                    </div>
                </div>
            </div>      
            ";
            echo $printArticolo;    
        }
        function alert($msg){
            echo "<script type='text/javascript'>alert('$msg')</script>";
        }
    ?>
        </div>
    </div>
</body>

<footer class="page-footer blue accent-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Amazing</h5>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container"> ©2020 Papa</div>
    </div>
</footer>

</html>