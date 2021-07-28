<?php
require "db.php";
//recupere la fiche du film
$id = $_GET['id'];
$sql = "SELECT * FROM film WHERE id =  :id";
$statment = $connection->prepare($sql);
$statment->execute([':id' =>$id]);
$film = $statment->fetch(PDO::FETCH_OBJ);

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

        if(move_uploaded_file($file_temp, $path)){

            $sql = "UPDATE film set titre=:titre, annee=:date, image=:image WHERE id = :id";
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
                    <input type="text" class="form-control" name="titre" value="<?=$film->titre?>">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="<?=$film->annee?>">
                </div>

                <div class="form-group">
                    <label>image</label>
                    <img src="<?=$film->image?>" widht="100">
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php" ?>