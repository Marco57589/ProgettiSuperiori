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
                <li><a href="carrello.php">Carrello</a></li>                
                <li><a href="index.php" class="waves-effect blue accent-2 btn">LOG-OUT</a></li>
            </ul>
        </div>
    </nav>

    <div class="row" style="margin-bottom: 0px;">
        <div class="col s6 m2 l2 blue lighten-2 full-width">
            <!-- pannello blu sinistra -->
        </div>

        <div class="col s12 m8 l9 full-width">

            <?php
            include 'dati.php';
            $row = 0;
       
            session_start();
            $idUser = $_SESSION["iduser"];

            if($idUser==null){
                header("refresh: 0; url=index.php");
            }          
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {	                
                $idArticolo = $_POST['articolo']; 
                $numArticoli = $_POST['quantita'];
                $_SESSION['carrello'].=$idArticolo.'#'.$numArticoli.'_';
            }
            
            

            $sql = "SELECT * FROM Articoli";
            $result = mysqli_query($connessione, $sql);                
                if (mysqli_num_rows($result) > 0) {                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $articolo="      
                            <div class='col m3 s4'>
                                <div class='card'>
                                    <form method='POST' action=''>
                                        <div class='card-image'>
                                            <img class='materialboxed' width='75' height='200' src='img/articoli/$row[Foto].jpg';                                        
                                            <span class='card-title left-align'></span>                
                                        </div>
                                        <div class='card-content'>
                                            <p>$row[Descrizione]</p>
                                            <p>$row[Prezzo]€</p>
                                        </div>
                                    <div class='card-action'>
                                        <input id='numarticolo' name='articolo' type='text' value='$row[idArt]' style='display:none;'></input>
                                        <label for='insquantita'>Quantità</label>	
                                        <input id='insquantita' type='number' name='quantita' min='1' value='1'></input>                                   
                                        <button type='submit' class='waves-effect blue accent-2 btn'>Aggiungi al carrello<i class='material-icons right'>add</i></button>                                                                    
                                    </div>
                                    </form>
                                </div>
                             </div>                     
                        ";
                        echo $articolo;                        
                    }
                } else {
                    echo "0 results";
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