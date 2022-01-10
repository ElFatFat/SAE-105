<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="Ressources/favicon.ico" />
    <title>Twenty One Pilots</title>
    <meta name="Description" content="Site web officiel du groupe Twenty One Pilots"/>
    <meta name="keywords" content="MOW, musique, groupe, officiel, electro, rock"/>
    <link href="Styles/style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>

    <?php include('header.html'); ?>

    <div id="offset"></div>
    <div id="content_bonus5w">

      <form method="post">
           <input type="text" placeholder="Recherchez le titre d'une musique" name="search_field" id="search_field"></input>
          <input type="submit" name="button_search" id="button_search" value="  ." /><br/>
      </form>
    <?php include('search.php'); ?>

    </div>

    <?php include('footer.html'); ?>  

  </body>

</html>