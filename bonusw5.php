<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="Ressources/favicon.ico" />
    <title>Twenty One Pilots</title>
    <meta name="Description" content="Site web officiel du groupe Twenty One Pilots"/>
    <meta name="keywords" content="MOW, musique, groupe, officiel, electro, rock"/>
    <link href="Styles/style.css" rel="stylesheet" type="text/css">
    <script src="Javascript/search.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://livejs.com/live.js"></script> <!--Inclus afin de reload la page automatiquement dans le navigateur a des fins de développement-->
  </head>
  <body onload="index();">>

    <?php include('header.html'); ?>

    <div id="offset"></div>
    <div id="content_bonus5w">

      <form method="post">
           <input type="text" placeholder="Recherchez le titre d'une musique" name="search_field" id="search_field"></input>
          <input type="submit" name="button_search" id="button_search" value="Rechercher" /><br/>
      </form>
      <?php include('search.php'); ?>
    </div>

    <?php include('footer.html'); ?>  

  </body>

</html>