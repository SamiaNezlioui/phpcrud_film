<?php
require "db.php";
if (
    isset($_POST['titre']) &&
    isset($_POST['date']) &&
    isset($_FILES['image'])
) {
    $titre = $_POST['titre'];
    $date = $_POST['date'];

    //IMAGE
    $file_name = $_FILES['image']['name']; //envoi dans la base de donnée
    $file_temp = $_FILES['image']['tmp_name']; //pour deplacer le fichier

    //variable pour controler l'extention du fichier

    $allowed_ext = array("jpg","jpeg", "gif"); //extention autorisées
    $exp = explode(".", $file_name); //decompose lle fichier image
    $ext = end($exp); //prend le derniere valeur aprés le point

    $path = "images/".$file_name; //chemin pouer stocké l'image
    if (in_array($ext, $allowed_ext)){
        if(move_uploaded_file( $file_temp, $path)){
            $sql = "INSERT INTO film (titre, annee, image) VALUES (:titre, :date, :image)";
            $statment = $connection->prepare($sql);
            if ($statment->execute(
                [
                    ":titre" => $titre,
                    ":date"  => $date,
                    ":image" => $path
                ]
            )) {
                print "ajouter avec succer";
            }
        }
        }
        
    }else{
        print "Erreur c'est pas le bon fichier";
    }
?>

<?php require "header.php" ?>
<div class="container">
    <h1>Editer un film</h1>
    <div class="row">
        <div class="col">
            
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>

                <div class="form-group">
                    <label>image</label>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php" ?>