<div class="container" style="text-align: center;">
<h2>Veuillez choisire une image dans la liste ou uploader une image</h2>
<button id="showGaleryBtn">Voir galerie</button>
<button id="uploadPicBtn">Uploader une image</button>
<link rel="stylesheet" href="picture.css">
<?php
$choise = "galerie";
if ($choise == "galerie") {
    $path    = 'res';
    $files = scandir($path);
    echo "<br><br>";
    // var_dump($files);
?>



<?php
}

function getImageFiles($files) {
    $imageFiles = array();
    $imageFilesExtensions = array("jpg", "jpeg", "png", "bmp");
    for ($i = 0; $i < count($files); $i++) {
        if (in_array(strtolower(pathinfo($files[$i])['extension']), $imageFilesExtensions)) {
            array_push($imageFiles, $files[$i]);
        }
    }
    return $imageFiles;
}

$imagesFiles = getImageFiles($files);

function printGalery($imageFiles) {
    echo "<div class='card bg-dark galeryContainer'>";
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    for ($i = 0; $i < count($imageFiles); $i++) {
        echo '<img src="res/' . $imageFiles[$i] . '" alt="canyon" width="150" height="100">';
    }
    echo "</div>";
}

function printUploadBox() {
    echo "<div class='card bg-dark uploadPicBox'>";
    echo "Veuillez uploader une image ";
    echo "<button>Choisir une image</button>";
    echo "</div>";
}

printGalery($imagesFiles);
printUploadBox();

?>
</div>
<script src="picture.js"></script>
<!-- <img src="res/canyon.jpg" alt="canyon" width="150" height="100"> -->