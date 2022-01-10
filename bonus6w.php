<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="Ressources/favicon.ico" />
    <title>Twenty One Pilots</title>
    <meta name="Description" content="Site web officiel du groupe Twenty One Pilots"/>
    <meta name="keywords" content="MOW, musique, groupe, officiel, electro, rock"/>
    <link href="Styles/style.css" rel="stylesheet" type="text/css">
    <script src="Javascript/add.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>

    <?php include('header.html'); ?>

    <div id="offset"></div>
    <div id="content_bonus6w">

    <form method="post">
           <input type="text" placeholder="Titre" name="title_field" class="input_field"></input>
           <input type="text" placeholder="Durée" name="duration_field" class="input_field"></input>
           <input type="text" placeholder="Album" name="album_field" class="input_field"></input>
           <input type="text" placeholder="Lien intégré Spotify" name="url_field" class="input_field"></input>
          <input type="submit" name="button_add" id="button_add" class="button" value="AJOUTER" /><br/>
      </form>
      <button id="Clipboard" onclick="addToClipboard(0)" class="button">Ajouter au presse-papiers !</button>
    <?php include('add.php'); ?>

    </div>

    <?php include('footer.html'); ?>  

  </body>

</html>