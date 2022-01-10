<?php

//Initialisation de variables
$sizeTab = $sizeTabUrl = $sizeTabDuration = $sizeTabAlbum = $i = 0;
$musicListTab = $urlListTab = $durationListTab = $albumListTab = [];
$prefixDev = '@';

//Fonctions convertissant les fichiers en tableau


fileToTabSong();
fileToTabURL();
fileToTabDuration();
fileToTabAlbum();
//Vérification de la taille des tableau pour éviter toute corruption de données
if ((($sizeTab != $sizeTabUrl) || ($sizeTabDuration != $sizeTabAlbum)) || ($sizeTab != $sizeTabAlbum)) {
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
    global $prefixDev;

    $i = 0;
    $resultNumber = 0;

    //Commande DEV avec @xxxxxx
    if (str_starts_with($valueInput, $prefixDev)) {
        $command = substr($valueInput, 1);
        if (str_starts_with($command, 'show')) {
            $command = substr($command, 4);
            if (is_numeric($command)) {
                if ($command > ($sizeTab - 1)) {
                    echo '<script>alert("Veuillez entrer une valeur inférieure à la quantité de musique.")</script>';
                } else {
                    displayInfo($command);
                }
            } else {
                echo '<script>alert("Veuillez entrer une valeur numérique uniquement.")</script>';
            }
        }

        if (str_starts_with($command, 'edit')) {
            $command = substr($command, 4);
            if (is_numeric($command)) {
                if ($command > ($sizeTab - 1)) {
                    echo '<script>alert("Veuillez entrer une valeur inférieure à la quantité de musique.")</script>';
                } else {
                    displayInfo($command);
                }
            } else {
                echo '<script>alert("Veuillez entrer une valeur numérique uniquement.")</script>';
            }
        }

        if (str_starts_with($command, 'remove')) {
            $command = substr($command, 6);
            if (is_numeric($command)) {
                if ($command > ($sizeTab - 1)) {
                    echo '<script>alert("Veuillez entrer une valeur inférieure à la quantité de musique.")</script>';
                } else {
                    displayInfo($command);
                }
            } else {
                echo '<script>alert("Veuillez entrer une valeur numérique uniquement.")</script>';
            }
        }

    } else {

        while ($i < $sizeTab) {
            $musicListTabUppercase = strtoupper($musicListTab[$i]);
            if (str_contains($musicListTabUppercase, $valueInputUppercase)) {
                $resultNumber = $resultNumber + 1;
                displayInfo($i);
            }
            $i = $i + 1;
        }
        if ($resultNumber == 0) {
            echo "0 résultats correspondant à votre recherche.";
        }
    }
}

//Fonctions convertissant les fichiers en tableau
function fileToTabSong()
{
    global $sizeTab, $musicListTab;
    //Ouverture du fichier list_music.txt en lecture uniquement.
    $fileSong = fopen("Datafiles/list_music.txt", "r") or die("Liste de musique introuvable !");
    //Boucle while() faisant x nombre d'itérations avec x étant le nombre de ligne du fichier.
    //Chaque ligne du fichier deviens une valeur du tableau musicListTab[].
    while (!feof($fileSong)) {
        $musicListTab[] =  fgets($fileSong);
        $sizeTab = count($musicListTab);
    }
    //Fermeture du fichier
    fclose($fileSong);
}
function fileToTabURL()
{
    global $sizeTabUrl, $urlListTab;

    $fileUrl = fopen("Datafiles/list_url.txt", "r") or die("Liste des URLs introuvable !");
    while (!feof($fileUrl)) {
        $urlListTab[] =  fgets($fileUrl);
        $sizeTabUrl = count($urlListTab);
    }
    fclose($fileUrl);
}
function fileToTabDuration()
{
    global $sizeTabDuration, $durationListTab;

    $fileDuration = fopen("Datafiles/list_duration.txt", "r") or die("Liste de dates de parutions introuvable !");
    while (!feof($fileDuration)) {
        $durationListTab[] =  fgets($fileDuration);
        $sizeTabDuration = count($durationListTab);
    }
    fclose($fileDuration);
}
function fileToTabAlbum()
{
    global $sizeTabAlbum, $albumListTab;

    $fileAlbum = fopen("Datafiles/list_album.txt", "r") or die("Liste des albums introuvable !");
    while (!feof($fileAlbum)) {
        $albumListTab[] =  fgets($fileAlbum);
        $sizeTabAlbum = count($albumListTab);
    }
    fclose($fileAlbum);
}


function displayInfo($index)
{
    //On récupére les variables modifiées dans des fonctions hors de portée
    global $musicListTab;
    global $urlListTab;
    global $durationListTab;
    global $albumListTab;

    echo '<div class="result_search"><p class="title_search"> <strong>' . ($musicListTab[$index]) . '</strong> - ' . ($albumListTab[$index]) . '<br>' . ($urlListTab[$index]) . '<br><p>Durée du titre : ' . ($durationListTab[$index]) . '</p><br></div>';
}

//Attente de l'appui du bouton pour lancer la fonction isInputInFile()
if (array_key_exists('button_search', $_POST)) {
    isinputInFile();
}
