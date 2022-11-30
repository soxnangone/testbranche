<!DOCTYPE html>
<html>
<html leng="en">
<head>
	               <title>Accueil</title>
                  <!-- MON LIEN BOOTSTRAP-->
	    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
                  <!-- MA FEUILLE DE STYLE-->
	    <link rel="stylesheet" type="text/css" href="my_css/accueil.css">
                  <!-- APPEL DE FONTAWESEME-->
	    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="JS/jquery.js">
      <link rel="stylesheet" type="text/css" href="JS/bootstrap.bundle.min.js">
      

</head>
<body style="backgroung-image">

                     <!-- MA BARRE DE NAVIGATION-->
    <div class="container">
        <div class="row">
        <div class="col-lg-12">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
               
                  

                       <!-- MES LIENS-->
    <div class="collapse navbar-collapse" id="navbarNav" >
      
      <div class="col-lg-4">
       
          <a class="nav-link "  href="welcom.php">Welcom</a>
        
        </div>
        <div class="col-lg-4">
          <a class="nav-link "href="?contenu=Juge"> Juge </a>
        
        </div>
        <div class="col-lg-4">
          <a class="nav-link "href="?contenu=Presumes"> Presumes </a>
        
        </div>
        <div class="col-lg-4">
        <a class="nav-link "href="?contenu=Gerer"> Gerer </a>
    
  </div>
  <div class="col-lg-4">
        <a class="nav-link "href="?contenu=ListePresumes"> ListePresumes </a>
    
  </div>
  </div>
</div>
</nav>
</div>
</div>

  <!--SCRIPT PHP QUI APPEL MES FORMULAIRES DANS MA PAGE D'ACCUEIL-->
<?php

                if(isset($_REQUEST['contenu']))
                {
                    $contenu=$_REQUEST['contenu'];
                    if($contenu=='Juge')
                    {
                     require("fjuges.php");
                    }
                    elseif($contenu=='Presumes')
                    {
                     include("fpresumes.php");
                    }
                    
                    elseif($contenu=='Gerer')
                    {
                     include("fgerer.php");
                    }
                    elseif($contenu=='ListePresumes')
                    {
                     include("ListePresumes.php");
                    }

                   
                    
                    else
                    {
                        echo '<span style="color: red"> Erreur : Page introuvable </span>';
                    }
                }
                
              ?>
         
            
</body>
</html>