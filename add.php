<?php

//Initialisation de variables
$sizeTab = $sizeTabUrl = $sizeTabDuration = $sizeTabAlbum = $i = 0;
$musicListTab = $urlListTab = $durationListTab = $albumListTab = [];
global $musicListTab;
global $urlListTab;
global $durationListTab;
global $albumListTab;

fileToTabSong();
fileToTabURL();
fileToTabDuration();
fileToTabAlbum();

//Vérification de la taille des tableau pour éviter toute corruption de données
if ((($sizeTab != $sizeTabUrl)||($sizeTabDuration != $sizeTabAlbum))||($sizeTab != $sizeTabAlbum)) {
    echo "<script>alert('Erreur critique : certains fichiers contenant les données possédent des tailles différentes.');</script>";
    echo "L'affichage des résultats peut être défectueux.";
}

function displayInfo($index){
    global $musicListTab;
    global $urlListTab;
    global $durationListTab;
    global $albumListTab;
    
    echo '<div class="result_search"><p class="title_search"> <strong>'.($musicListTab[$index]).'</strong> - '.($albumListTab[$index]).'<br><p>Durée du titre : '.($durationListTab[$index]).'</p><br><button id="button_edit" onclick="edit('.($index).')">Modifier</button><input type="submit" name="button_delete" id="button_delete" value="Supprimer" /><br/>
    <form method="post">
        <input type="submit" name="button_add" id="button_add" value="Ajouter" /><br/>
        <input type="submit" onclick="edit('.($index).')" name="button_edit" id="button_edit" value="Modifier" /><br/>
        <input type="submit" name="button_delete" id="button_delete" value="Supprimer" /><br/>
    </form></div>';
    }

function checkForEmpty($a,$b,$c,$d){
    if(($a!="")&&($b!="")&&($c!="")&&($d!="")){
        addDataToFile($a,$b,$c,$d);
    }else {
        echo "<script>alert('Valeurs manquantes');</script>";
    }
}

function addDataToFile($title,$duration,$album,$url){
    $titleFile = fopen("Datafiles/list_music.txt", "a") or die("Unable to open music file!");
    $durationFile = fopen("Datafiles/list_duration.txt", "a") or die("Unable to open duration file!");
    $albumFile = fopen("Datafiles/list_album.txt", "a") or die("Unable to open album file!");
    $urlFile = fopen("Datafiles/list_url.txt", "a") or die("Unable to open url file!");
    fwrite($titleFile, (PHP_EOL . ($title)));
    fwrite($durationFile, (PHP_EOL . ($duration)));
    fwrite($albumFile, (PHP_EOL . ($album)));
    fwrite($urlFile, (PHP_EOL . ($url)));
    fclose($titleFile);
    fclose($durationFile);
    fclose($albumFile);
    fclose($urlFile);

}

//Fonctions convertissant les fichiers en tableau
function fileToTabSong() {
    global $sizeTab, $musicListTab;
    //Ouverture du fichier list_music.txt en lecture uniquement.
    $fileSong = fopen("Datafiles/list_music.txt", "r") or die("Liste de musique introuvable !");
    //Boucle while() faisant x nombre d'itérations avec x étant le nombre de ligne du fichier.
    //Chaque ligne du fichier deviens une valeur du tableau musicListTab[].
    while(!feof($fileSong)) {
        $musicListTab[] =  fgets($fileSong);
        $sizeTab = count($musicListTab);
    }
    //Fermeture du fichier
    fclose($fileSong);
}
function fileToTabURL() {
    global $sizeTabUrl, $urlListTab;

    $fileUrl = fopen("Datafiles/list_url.txt", "r") or die("Liste des URLs introuvable !");
    while(!feof($fileUrl)) {
        $urlListTab[] =  fgets($fileUrl);
        $sizeTabUrl = count($urlListTab);
    }
    fclose($fileUrl);
}
function fileToTabDuration() {
    global $sizeTabDuration, $durationListTab;

    $fileDuration = fopen("Datafiles/list_duration.txt", "r") or die("Liste de dates de parutions introuvable !");
    while(!feof($fileDuration)) {
        $durationListTab[] =  fgets($fileDuration);
        $sizeTabDuration = count($durationListTab);
    }
    fclose($fileDuration);
}
function fileToTabAlbum() {
    global $sizeTabAlbum, $albumListTab;

    $fileAlbum = fopen("Datafiles/list_album.txt", "r") or die("Liste des albums introuvable !");
    while(!feof($fileAlbum)) {
        $albumListTab[] =  fgets($fileAlbum);
        $sizeTabAlbum = count($albumListTab);
    }
    fclose($fileAlbum);
}


if(array_key_exists('button_add',$_POST)){
    checkForEmpty($_POST['title_field'], $_POST['duration_field'],$_POST['album_field'], $_POST['url_field']);
}
