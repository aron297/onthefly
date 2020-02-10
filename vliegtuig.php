

<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Vluchten</title>
</head>
<body>
    <ul>
        <br>
    <li><a href="index.php">Home</a></li>
    <li><a href="vliegtuigen.php">Vliegtuigen</a></li>
    <li><a href="planning.php">Planning</a></li>
</ul>
    
    <?php  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "vliegtuigreizen";    
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
     $vliegtuignummer = $_GET['vliegtuignummer'];
     
      $sql= "SELECT vliegtuignummer, welk_vliegtuig, datum_vertrek, datum_retour, bestemming, status FROM planning where vliegtuignummer =$vliegtuignummer";
                $statement = $connect->prepare($sql);  
                $statement->execute();
     $results=$statement->fetchAll();
       foreach ($results as $output){
        ?>
    <div class="fotooo">
         <table class="vliegtuig"><td>
             <fieldset class="vliegtuigov">
                 <legend>Vluchten</legend>
         
         <p><a href="index.php">
        
    <img class="fotos" src="fotos/planning.jpg"><br><br><br><br><br><br>
             </a></p><p class="text"><?php  echo "Vliegtuignummer: " . $output["vliegtuignummer"] . "<br>Welk vliegtuig: ". $output["welk_vliegtuig"]. "<br>Datum vertrek: " . $output["datum_vertrek"]. "<br>Datum retour: " . $output["datum_retour"]. "<br>Bestemming: " . $output["bestemming"]. "<br>Status: " . $output["status"];   ?></p></fieldset></td><?php
    }
     ?></table></div><?php
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>
    
    <div class="inhoud">
    <h1 class="home">Vluchten met dit vliegtuig</h1>
    </div>
    <?php  
        if(isset($message))  
        {  
                echo '<label class="text-danger">'.$message.'</label>';  
        }  
    ?>
</body>
</html>