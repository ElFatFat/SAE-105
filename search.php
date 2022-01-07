<?php

//Initialisation d'un tableau qui contiendra la liste des musiques
$musicListTab = [];

//Ouverture du fichier list_music.txt en lecture uniquement.
$fileSong = fopen("list_music.txt", "r") or die("Liste de musique introuvable !"); //Ouverture du fichier

//Boucle while() faisant x nombre d'itérations avec x étant le nombre de ligne du fichier.
//Chaque ligne du fichier deviens une valeur du tableau musicListTab[].
while(!feof($fileSong)) {
  $musicListTab[] =  fgets($fileSong);
  $sizeTab = count($musicListTab);
}

//DEBUG ONLY
//Affichage des musiques existantes d'après le tableau.
// $i = 0;
// while($i< $sizeTab) {
//     echo ($musicListTab[$i]) . "<br>";
//     $i = $i + 1;
// }



//MAIN FUNCTION
function isinputInFile()
{
    //On récupére la valeur de champ de texte
    $valueInput = $_POST["search_field"];
    $valueInputUppercase = strtoupper($valueInput);

    //On récupére les valeurs initié en dehors de cette fonction
    global $sizeTab;
    global $musicListTab;

    //DEBUG ONLY
    //Affichage de la valeur récupérée
    // echo "<script>alert('$valueInput');</script>";
    //Affichage de la taille du tableau récupéré
    // echo "<script>alert('$sizeTab');</script>";

    $i = 0;
    $resultNumber = 0;
    while($i<$sizeTab) {
        $musicListTabUppercase = strtoupper($musicListTab[$i]);
        if (str_contains($musicListTabUppercase, $valueInputUppercase)) { 
            $resultNumber = $resultNumber + 1;
            echo ($musicListTab[$i]).' contient la recherche "' . ($valueInput) . '". <br>';
        }
        $i = $i + 1;
      }
    if ($resultNumber == 0) {
        echo "Aucun résultat trouvé";
    }
}

//Attente de l'appui du bouton pour lancer la fonction isInputInFile()
if(array_key_exists('button_search',$_POST)){
    isinputInFile();
}

fclose($fileSong);
?>