

<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Vluchten</title>
</head>
<body>
    <ul>
        <br>
    <li><a href="index.php" class="active">Home</a></li>
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
     
      $sql= "SELECT vliegtuignummer, type, vliegtuigmaatschappij, status FROM vliegtuigen";
                $statement = $connect->prepare($sql);  
                $statement->execute();
     $results=$statement->fetchAll();
       foreach ($results as $output){
        ?>
    <div class="fotooo">
         <table class="vliegtuig"><td>
             <fieldset class="vliegtuigov">
                 <legend>Vliegtuigen</legend>
         
         <p><a href="vliegtuig.php?vliegtuignummer=<?php  echo $output["vliegtuignummer"]?>">
        
    <img class="fotos" src="fotos/vliegtuig.jpg"><br><br><br><br><br><br>
             </a></p><p class="text"><?php  echo "Vliegtuignummer: " . $output["vliegtuignummer"] . "<br>Type: ". $output["type"]. "<br>Vliegmaatschappij: " . $output["vliegtuigmaatschappij"]. "<br>Status: " . $output["status"];   ?></p></fieldset></td><?php
    }
     ?></table></div><?php
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>
    
    <div class="inhoud">
    <h1 class="home">ON THE FLY</h1>
    </div>
    <?php  
        if(isset($message))  
        {  
                echo '<label class="text-danger">'.$message.'</label>';  
        }  
    ?>
</body>
</html>