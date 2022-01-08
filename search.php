<?php

$sizeTab = 0;
$sizeTabUrl = 0;
$sizeTabDuration = 0;
$sizeTabAlbum = 0;

$musicListTab = [];
$urlListTab = [];
$durationListTab = [];
$albumListTab = [];

function fileToTabSong() {
    global $sizeTab, $musicListTab;
    //Ouverture du fichier list_music.txt en lecture uniquement.
    $fileSong = fopen("list_music.txt", "r") or die("Liste de musique introuvable !");
    //Boucle while() faisant x nombre d'itérations avec x étant le nombre de ligne du fichier.
    //Chaque ligne du fichier deviens une valeur du tableau musicListTab[].
    while(!feof($fileSong)) {
        $musicListTab[] =  fgets($fileSong);
        $sizeTab = count($musicListTab);
    }
    fclose($fileSong);
}
function fileToTabURL() {
    global $sizeTabUrl, $urlListTab;

    $fileUrl = fopen("list_url.txt", "r") or die("Liste des URLs introuvable !");
    while(!feof($fileUrl)) {
        $urlListTab[] =  fgets($fileUrl);
        $sizeTabUrl = count($urlListTab);
    }
    fclose($fileUrl);
}
function fileToTabDuration() {
    global $sizeTabDuration, $durationListTab;

    $fileDuration = fopen("list_duration.txt", "r") or die("Liste de dates de parutions introuvable !");
    while(!feof($fileDuration)) {
        $durationListTab[] =  fgets($fileDuration);
        $sizeTabDuration = count($durationListTab);
    }
    fclose($fileDuration);
}
function fileToTabAlbum() {
    global $sizeTabAlbum, $albumListTab;

    $fileAlbum = fopen("list_album.txt", "r") or die("Liste des albums introuvable !");
    while(!feof($fileAlbum)) {
        $albumListTab[] =  fgets($fileAlbum);
        $sizeTabAlbum = count($albumListTab);
    }
    fclose($fileAlbum);
}

fileToTabSong();
fileToTabURL();
fileToTabDuration();
fileToTabAlbum();
if ((($sizeTab != $sizeTabUrl)||($sizeTabDuration != $sizeTabAlbum))||($sizeTab != $sizeTabAlbum)) {
    echo "<script>alert('Erreur critique : certains fichiers contenant les données possédent des tailles différentes.');</script>";
    echo "L'affichage des résultats peut être défectueux.";
}



//MAIN FUNCTION
function isinputInFile()
{
    //On récupére la valeur de champ de texte
    $valueInput = $_POST["search_field"];
    $valueInputUppercase = strtoupper($valueInput);

    //On récupére les valeurs initialisée en dehors de cette fonction
    global $sizeTab;
    global $musicListTab;
    global $urlListTab;

    $i = 0;
    $resultNumber = 0;
    while($i<$sizeTab) {
        $musicListTabUppercase = strtoupper($musicListTab[$i]);
        if (str_contains($musicListTabUppercase, $valueInputUppercase)) { 
            $resultNumber = $resultNumber + 1;
            echo ($musicListTab[$i]).' contient la recherche "' . ($valueInput) . '". <br>';
            displayInfo($i);
        }
        $i = $i + 1;
      }
    if ($resultNumber == 0) {
        echo "0 résultats correspondant à votre recherche.";
    }
}

function displayInfo($index){
global $musicListTab;
global $urlListTab;
global $durationListTab;
global $albumListTab;

echo '<div id="result_search"><p>Titre de la chanson : '.($musicListTab[$index]).'</p><br><p>Url de la musique : '.($urlListTab[$index]).'</p><br><p>Durée du titre : '.($durationListTab[$index]).'</p><br><p>Album contenant le titre : '.($albumListTab[$index]).'</p><br></div>';
}
//Attente de l'appui du bouton pour lancer la fonction isInputInFile()
if(array_key_exists('button_search',$_POST)){
    isinputInFile();
}
?>