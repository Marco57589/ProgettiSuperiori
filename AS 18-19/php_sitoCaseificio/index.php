<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>


<body style="background-image: url('img/bg.jpg');">

    <nav>
        <div class="nav-wrapper blue lighten-2">
            <a class="brand-logo">Caseifici</a>           
        </div>
    </nav>
    <main>

    <div class="row" style="margin-bottom: 0px;">
         
        <?php
        include 'dati.php';
        $row = 0;

        $sql = 
        "SELECT nome, url, id_caseificio 
        FROM caseificio NATURAL JOIN immagine
        WHERE id_immagine = 1;
        ";

        $result = mysqli_query($connessione, $sql);        

        if (mysqli_num_rows($result)) {
            while($row = mysqli_fetch_assoc($result)) {
                
                $stampa = "      
                <div class='col l3 m4 s6'>
                    <div class='card'>        
                        <div class='card-image'>
                            <img class='materialboxed' height='200px' src='img/caseifici/$row[url].jpg';                                        
                            <span class='card-title left-align'></span>                
                        </div>
                        <div class='card-content'>
                            <p>$row[nome]</p>                          
                        </div>
                        <div class='card-action'>      
                            <form method='GET' action=galleria.php>      
                            <input id='dati' name='idCaseificio' type='text' value='$row[id_caseificio]' style='display:none;'></input>              
                                <button type='submit'name=submit class='waves-effect blue accent-2 btn' value='1'>Galleria</button>  
                            </form>                                                                                             
                        </div>
                    </div>
                </div>      
                ";
                echo $stampa;
            }
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
        <div class="container"> ©2020 Papa</div>
    </div>
</footer>

</body>
</html>