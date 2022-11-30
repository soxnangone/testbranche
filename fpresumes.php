<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.min.css">
                  <!-- MA FEUILLE DE STYLE-->
	    <link rel="stylesheet" type="text/css" href="formulaire.css">
                  <!-- APPEL DE FONTAWESEME-->
	    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../bootstrap.scss" class="rel"></link>
        


</head>
<body>
<form method="POST" action="" enctype="multipart/form-data">
	<?php

       


if (  isset($_POST['idP'])|| isset($_POST['nomP']) || isset($_POST['prenomP']) || isset($_POST['naissP']) || isset($_POST['lieu'])  ) {
    
$idP=$_POST['idP'];
$nomP=$_POST['nomP'];
$prenomP=$_POST['prenomP'];
$naissP=$_POST['naissP'];
$lieu=$_POST['lieu'];




//CREATION DE MA CONNECTION A LA BASE DE DONNEE

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gesdebat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//PREPARATION  ET EXECUTION DE MA REQUETE 
$req = $bdd->prepare('INSERT INTO presumes(idP,nomP,prenomP,naissP,lieu) VALUES( :idP,:nomP, :prenomP, :naissP,:lieu)');

$req->execute(array(
   'idP'=> $idP,
    'nomP' => $nomP,
    'prenomP' => $prenomP,
    'naissP' => $naissP,
    'lieu' => $lieu

    

    ));
 

}
?>
<img src="img/img4.JPG" alt="">
 <p> &nbsp</p>

<div class="container">
        <div class="row">
        <div class="col-lg-2">
</div>
        <div class="col-lg-8">
<div class="card">
  <div class="card-header bg-secondary " >
    <h4><strong><p align ="center">Formulaire Presumes</p></strong></h4>
  </div>
  <div class="card-body ">
    <h5 class="card-title"></h5>
    <h4><p class="card-text" align ="center"><strong>Veuillez renseigner les informations de la Presumes</strong></p></h4>
    <h5><label for="idP" class="form-label">Id*:</label>
<input type="text" class="form-control" name="idP"  placeholder="Entrer votre identifiant"></h5>
<h5><label for="nomP" class="form-label">Nom*:</label>
<input type="text" class="form-control" name="nomP"  placeholder="Entrer votre nom"></h5>
<h5><label >Prenom*:</label> 
<input type="text" class="form-control"name="prenomP" placeholder="Entrer votre prenom"  ></h5>
<h5><label>Date de naissance*:</label>
<input type="date" class="form-control" name="naissP" ></h5>
<h5><label >Lieu*:</label> 
<input type="text" class="form-control"name="lieu" placeholder="Entrer votre lieu de naissance"  ></h5>
<input type="submit" name="envoyer" value="envoyer" class="form-control"></label>
</div>
<div class="col-lg-2">
</div>
</div>
</div>
<?php if(isset($_POST['envoyer']))
{
    
    header("location:welcom.php");
}
?>
</body>
</html>