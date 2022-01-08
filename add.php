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
$i=0;
while($i<$sizeTab) {
    displayInfo($i);
    $i = $i + 1;
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
        echo 'Valeur présentes';
        addDataToFile($a,$b,$c,$d);
    }else {
        echo 'Valeur manquante';
    }
}

function addDataToFile($title,$duration,$album,$url){
    $titleFile = fopen("list_music.txt", "a") or die("Unable to open music file!");
    $durationFile = fopen("list_duration.txt", "a") or die("Unable to open duration file!");
    $albumFile = fopen("list_album.txt", "a") or die("Unable to open album file!");
    $urlFile = fopen("list_url.txt", "a") or die("Unable to open url file!");
    fwrite($titleFile, (PHP_EOL . ($title)));
    fwrite($durationFile, (PHP_EOL . ($duration)));
    fwrite($albumFile, (PHP_EOL . ($album)));
    fwrite($urlFile, (PHP_EOL . ($url)));
    fclose($titleFile);
    fclose($durationFile);
    fclose($albumFile);
    fclose($urlFile);

}


if(array_key_exists('button_add',$_POST)){
    checkForEmpty($_POST['title_field'], $_POST['duration_field'],$_POST['album_field'], $_POST['url_field']);
    echo 'TEST';
    echo ($_POST['title_field']);
    echo ($_POST['duration_field']);
    echo ($_POST['album_field']);
    echo ($_POST['url_field']);
    echo '<script>
      if (confirm("Voulez-vous supprimer la musique")) {
        alert("Valider");

      } else {
        alert("cancel");
      }
      
    </script>';
}

?>