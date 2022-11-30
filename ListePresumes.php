<!DOCTYPE html>
<html>
<html leng="en">
<head>
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
	               <title></title>
            
                   </head>
                   <body>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gesdebat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    $selection="SELECT * FROM presumes";
    $exe=$bdd->query($selection);
    $donnees=$exe->fetchAll(PDO::FETCH_ASSOC);
   
    
    
   ?>
   <center>
  <p> &nbsp</p>

   
   <table  class="table table-striped   table-hover">
   <thead>
     <tr id="tr1" class="table-secondary">
            <th scope="col"><h3>Id</h3></td>
            <td align="center"><h3>Nom </h3></td>
            <td align="center"><h3>Prenom </h3></td>
            <td align="center"><h3>Date de Naissance </h3></td>
            <td align="center"><h3>Lieu de naissance</h3></td>
           
        </tr>
   
    <?php
foreach( $donnees as $value){
     ?>
    
        <tr >
            <td align="center" ><?php echo $value['idP']; ?></td>
            <td  align="center"><?php echo $value['nomP']; ?></td>
            <td align="center"><?php echo $value['prenomP']; ?></td>
            <td align="center"><?php echo $value['naissP']; ?></td>
            <td align="center"><?php echo $value['lieu']; ?></td>
            
            <?php
          }
          ?>
        </tr>
        </table>
        </center>
        <p>&nbsp</p>
        <div class="container">
        <div class="row">
        <div class="col-4">
        &nbsp
        </div>
        <div class="col-4">
        
        <button  class="form-control"><a href="welcom.php">Retour vers Welcom</a></button>
        </div>
        <?php
        

        ?>
        </body>
