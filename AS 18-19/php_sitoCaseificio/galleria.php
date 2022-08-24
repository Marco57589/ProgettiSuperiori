<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="PapaSettembrese.css">    
</head>

<body style="background-image: url('img/bg.jpg');">

    <nav>
        <div class="nav-wrapper blue lighten-2">
            <a class="brand-logo">Caseifici</a>
            <ul class="right">
                <li><a href="index.php" class="waves-effect blue accent-2 btn">HOME</a></li>
            </ul>
        </div>
    </nav>
    <main>

    <div class="row" style="margin-bottom: 0px;">
         
        <?php
        include 'dati.php';
        $row = 0;

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            
            $sql = 
            "SELECT nome, indirizzo 
            FROM caseificio 
            WHERE id_caseificio = $_GET[idCaseificio];
            ";

            $result = mysqli_query($connessione, $sql);        

            if (mysqli_num_rows($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                    $p="<div class='center col s12'> 
                    <h2>$row[nome]</h1>
                    <h6>$row[indirizzo]</h4>
                    </div></div>";                     
                    echo $p;             
                }
            }  
            
            $sql = 
            "SELECT url, descrizione 
            FROM immagine 
            WHERE id_caseificio = $_GET[idCaseificio];
            ";

            $result = mysqli_query($connessione, $sql);        

        if (mysqli_num_rows($result)) {
            $p="
            <div class='row' style='margin-bottom: 0px;'>
            <div class='slider col s6 offset-s3'>
            <ul class=slides>";
            while($row = mysqli_fetch_assoc($result)) {
                $p.="
                <li><img src='img/caseifici/$row[url].jpg' alt=$row[descrizione]></li>
                ";                   
            }
            $p.="</ul></div>";
            echo $p;
        }  

        }else{
            header("refresh: 0; url=index.php");
        }            
?> 

    </div>
    </main>
    <footer class="page-footer blue accent-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Caseifici</h5>
            </div>             
        </div>
    </div>
        <div class="footer-copyright">
        <div class="container"> ©2020 Settembrese Papa 5BI </div>
    </div>
</footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems, {height:450});
        });
    </script>
        
</body>
</html>