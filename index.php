

<?php
require "./db.php";
$sql = "SELECT * FROM film;";
$statement = $connection->prepare($sql);
$statement->execute();
$films = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require "header.php" ?>
<div class="container">
  <div class="row">
    <div class="col my=5">
      <h1>Liste des films</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Titre</th>
            <th scope="col">Année</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($films as $element): ?>
          <tr>
            <th scope="row">1</th>
            <td><?=$element->titre ?></td>
            <td><?=$element->annee ?></td>
            <td><img src="<?=$element-> image ?>" width="100"></td>

            <td>
              <button type="button" class="btn btn-success">Editer</button>
              <button type="button" class="btn btn-danger">Supprimer</button>
            </td>
          </tr>
         <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>


<?php require "footer.php" ?>