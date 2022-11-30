<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $message="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$connexion->prepare("select * from users where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des elections du Senegal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="pages/style/globale.css" />
    <script src="main.js"></script>
</head>
<body>
  <form method="POST" action="">
  <fieldset>
	 <legend align="center" style="color: #e5ec20"><h1>* Bienvenu dans le site Electoral *</h1></legend>
    <pre>
      <div id="depcontenu">

              <label for="login">Login *</label>
            <input type="text" name="login" id="login" class="input" placeholder="votre identifiant " required><br>
          
              <label for="pass">Mot de passe *</label>
            <input type="password" name="pass" id="pass" class="input" placeholder="votre password " required><br>

     <input type="submit"  value="valider" name="valider" id="valider">       <input type="reset"  value="annuler" id="depbot">
      </div>
    </pre>
  </fieldset>
  </form> 
  <?php if(!empty($message)){?>
  <div id="message"><?php echo $message?></div>
  <?php } ?> 
</body>
</html>