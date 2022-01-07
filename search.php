<?php
//Attente de l'appui du bouton pour lancer la fonction isInputInFile()
if(array_key_exists('button_search',$_POST)){
    isinputInFile();
}

//Initialisation d'un tableau qui contiendra la liste des musiques
$musicListTab = [];

//Ouverture du fichier list_music.txt en lecture uniquement.
$file = fopen("list_music.txt", "r") or die("Liste de musique introuvable !"); //Ouverture du fichier

// On entre toute les valeurs lignes par lignes dans le tab
while(!feof($file)) {
  $musicListTab[] =  fgets($file);
  $sizeTab = count($musicListTab);
}

//DEBUG - AFFICHAGE DU TABLEAU
$i = 0;
while($i< $sizeTab) {
    echo ($musicListTab[$i]) . "<br>";
    $i = $i + 1;
}




function isinputInFile()
{
    
   $valueInput = $_POST["search_field"];
   //DEBUG Affichage de la valeur
    // echo "<script>alert('$valueInput');</script>";

    $i = 0;
    global $sizeTab;
    global $musicListTab;
    global $valueInput;
    echo "<script>alert('$sizeTab');</script>";
    while($i<$sizeTab) {
        if (str_contains($musicListTab[$i], $valueInput)) { 
            echo 'COUCOU';
        }
        else {
            echo 'seeya';
        }
        echo($musicListTab[0]);
        echo($sizeTab);
        echo($valueInput);

        $i = $i + 1;
      }
}


fclose($file);
?>