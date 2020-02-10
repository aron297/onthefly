<?php  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "vliegtuigreizen";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
      if(isset($_POST["submit"]))  
      {  
           if(empty($_POST["eerste"]) || empty($_POST["tweede"]) || empty($_POST["derde"]) || empty($_POST["vierde"]) || empty($_POST["vijfde"]) || empty($_POST["zesde"]))  
           {  
                $message = '<label>Alle velden zijn verplicht</label>';  
           }  
           else  
           {  
               
                $query = "INSERT INTO planning (vliegtuignummer, welk_vliegtuig, datum_vertrek, datum_retour, bestemming, status) VALUES (:vliegtuignummer, :welk_vliegtuig, :datum_vertrek, :datum_retour, :bestemming, :status)";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array( 
                            'vliegtuignummer'     =>     $_POST["eerste"],
                            'welk_vliegtuig'     =>     $_POST["tweede"],  
                            'datum_vertrek'     =>     $_POST["derde"],
                            'datum_retour'     =>     $_POST["vierde"], 
                            'bestemming'     =>     $_POST["vijfde"],
                            'status'     =>     $_POST["zesde"]
                     )  
                );
               
               $message = '<label>toevoegen gelukt</label>';
            
               } 
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?> 

<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Planning</title>
</head>
<body>
    <ul>
        <br>
    <li><a href="index.php" >Home</a></li>
    <li><a href="vliegtuigen.php">Vliegtuigen</a></li>
    <li><a href="planning.php" class="active">Planning</a></li>
    
</ul>
    <div class="inhoud">
    <h1 class="home">Planning</h1>
      <div class="message">  
    <?php  
        if(isset($message))  
        {  
                echo '<label class="text-danger">'.$message.'</label>';  
        }  
    ?>
       </div> 
    <form method="post">
        <fieldset class="plannen">
        <legend>Vlucht inplannen</legend><br>
            <label>Vliegtuignummer:</label><br>
        <input class="textinvoer" type="text" name="eerste"> <br><br>
            <label>Welk vliegtuig:</label><br>
        <input class="textinvoer" type="text" name="tweede"> <br><br>
            <label>Datum vertrek:</label><br>
        <input class="textinvoer" type="date" name="derde"> <br><br>
            <label>Datum retour:</label><br>
        <input class="textinvoer" type="date" name="vierde" ><br><br>
            <label>Bestemming:</label><br>
        <input class="textinvoer" type="text" name="vijfde" ><br><br>
            <label>Status:</label><br>
        <input class="textinvoer" type="text" name="zesde" ><br><br>
        <input type="submit" name="submit" class="button"><br><br>
        </fieldset>
    </form>
    </div>
</body>
</html>