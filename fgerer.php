
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

       




if (  isset($_POST['idG'])||  isset($_POST['dateJugement'])  || isset($_POST['idJ']) || isset($_POST['idP'])    ) {
    
$idG=$_POST['idG'];
$dateJugement=$_POST['dateJugement'];
$idJ=$_POST['idJ'];
$idP=$_POST['idP'];






//CREATION DE MA CONNECTION A LA BASE DE DONNEE

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gesdebat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$selection="SELECT * FROM juge";
$execut=$bdd->query($selection);
$donnees=$execut->fetchAll(PDO::FETCH_ASSOC);

$selection1="SELECT * FROM presumes";
$execut1=$bdd->query($selection1);
$donnees1=$execut1->fetchAll(PDO::FETCH_ASSOC);
//PREPARATION  ET EXECUTION DE MA REQUETE 
$req = $bdd->prepare('INSERT INTO gerer(idG,dateJugement,idJ,idP) VALUES( :idG, :dateJugement,:idJ, :idP)');

$req->execute(array(
   'idG'=> $idG,
   'dateJugement' => $dateJugement,
    'idJ' => $idJ,
    'idP' => $idP
   
    

    

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
    <h4><strong><p align ="center">Formulaire Gerer</p></strong></h4>
  </div>
  <div class="card-body ">
    <h5 class="card-title"></h5>
    <h4><p class="card-text" align ="center"><strong>Veuillez renseigner les informations de  Gerer</strong></p></h4>
    <h5><label for="idG" class="form-label">Id*:</label>
<input type="text" class="form-control" name="idG"  placeholder="Entrer votre identifiant"></h5>
<h5><label>Date de jugement*:</label>
<input type="date" class="form-control" name="dateJugement" ></h5>
<p><h5><label for="">id Jugement*:</label> <select name="idJ" >
<option>Veuillez choisir un id de jugement </option><?php foreach ($donnees as $value):;?>
<option value="<?php echo $value['idJ'];?>"><?php echo $value ['idJ']; ?></option>
<?php endforeach ?></select></h5></p>
<p><h5><label for="">id Presumes*:</label> <select name="idP" >
<option>Veuillez choisir un id de Presumes </option><?php foreach ($donnees1 as $value):;?>
<option value="<?php echo $value['idP'];?>"><?php echo $value ['idP']; ?></option>
<?php endforeach ?></select></h5></p>
<input type="submit" name="envoyer" class="form-control" value="envoyer">
</label>
</div>
<div class="col-lg-2">
</div>
</div>
</div>


</body>
</html>