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
           if(empty($_POST["eerste"]) || empty($_POST["tweede"]) || empty($_POST["derde"]) || empty($_POST["vierde"]))  
           {  
                $message = '<label>Alle velden zijn verplicht</label>';  
           }  
           else  
           {  
               
                $query = "INSERT INTO vliegtuigen ( vliegtuignummer, type, vliegtuigmaatschappij, status) VALUES ( :vliegtuignummer, :type, :vliegmaatschappij, :status)";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array( 
                            
                            'vliegtuignummer'     =>     $_POST["eerste"],
                            'type'     =>     $_POST["tweede"],  
                            'vliegmaatschappij'     =>     $_POST["derde"],
                            'status'     =>     $_POST["vierde"] 
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
    <title>vliegtuigen</title>
</head>
<body>
    <ul>
        <br>
    <li><a href="index.php" >Home</a></li>
    <li><a href="vliegtuigen.php" class="active">Vliegtuigen</a></li>
    <li><a href="planning.php">Planning</a></li>
</ul>
    <div class="inhoud">
    <h1 class="home">Vliegtuigen</h1>
        <div class="message">  
    <?php  
        if(isset($message))  
        {  
                echo '<label class="text-danger">'.$message.'</label>';  
        }  
    ?>
       </div>
    <form class="invoeren" method="post">
        <fieldset class="vliegtuigen">
        <legend>Vliegtuig invoeren</legend><br>
            <label>Vliegtuignummer:</label><br>
        <input class="textinvoer" type="text" name="eerste"> <br><br>
            <label>Type:</label><br>
        <input class="textinvoer" type="text" name="tweede"> <br><br>
            <label>Vliegmaatschappij:</label><br>
        <input class="textinvoer" type="text" name="derde"> <br><br>
            <label>Status:</label><br>
        <input class="textinvoer" type="text" name="vierde" ><br><br>
        <input type="submit" name="submit" class="button"><br><br>
        </fieldset>
    </form>
    </div>
</body>
</html>