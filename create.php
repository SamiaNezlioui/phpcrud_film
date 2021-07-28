<?php
require "db.php"
?>

<?php require "header.php" ?>
<div class="container">
    <h1>Ajouter un nouveau film</h1>
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label>Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="text" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require "footer.php" ?>