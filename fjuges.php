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

       


if (  isset($_POST['idJ'])|| isset($_POST['nomJ']) || isset($_POST['prenomJ']) || isset($_POST['telJ']) || isset($_POST['emailJ'])  ) {
    
$idJ=$_POST['idJ'];
$nomJ=$_POST['nomJ'];
$prenomJ=$_POST['prenomJ'];
$telJ=$_POST['telJ'];
$emailJ=$_POST['emailJ'];




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
$req = $bdd->prepare('INSERT INTO juge(idJ,nomJ,prenomJ,telJ,emailJ) VALUES( :idJ,:nomJ, :prenomJ, :telJ,:emailJ)');

$req->execute(array(
   'idJ'=> $idJ,
    'nomJ' => $nomJ,
    'prenomJ' => $prenomJ,
    'telJ' => $telJ,
    'emailJ' => $emailJ

    

    ));
 

}

?>
 <p> &nbsp</p>

<div class="container">
        <div class="row">
        <div class="col-lg-2">
</div>
        <div class="col-lg-8">
<div class="card">
  <div class="card-header bg-secondary " >
    <h4><strong><p align ="center">Formulaire Juges</p></strong></h4>
  </div>
  <div class="card-body ">
    <h5 class="card-title"></h5>
    <h4><p class="card-text" align ="center"><strong>Veuillez renseigner les informations du juges</strong></p></h4>
    <h5><label for="idJ" class="form-label">Id*:</label>
<input type="text" class="form-control" name="idJ"  placeholder="Entrer votre identifiant"></h5>
<h5><label for="nomJ" class="form-label">Nom*:</label>
<input type="text" class="form-control" name="nomJ"  placeholder="Entrer votre nom"></h5>
<h5><label >Prenom*:</label> 
<input type="text" class="form-control"name="prenomJ" placeholder="Entrer votre prenom"  ></h5>
<h5><label>Telephone*:</label>
<input type="text" class="form-control" name="telJ" ></h5>
<h5><label >Email*:</label> 
<input type="text" class="form-control"name="emailJ" placeholder="Entrer votre emailJ "  ></h5>
<input type="submit" name="envoyer" value="envoyer" class="form-control"></label>
</div>
<div class="col-lg-2">
</div>
</div>
</div>

<!-- RETOUR VERS MA PAGE WELCOM APRES APPUIS SUR BOUTON ENVOYER-->
<?php if(isset($_POST['envoyer']))
{
    
    header("location:welcom.php");
}
?>
</body>
</html>