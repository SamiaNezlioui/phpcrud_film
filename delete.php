<?php
require "db.php";
$id = $_GET['id'];
$sql = "DELETE from film where id = :id";
$statment = $connection->prepare($sql);
if($statment->execute([":id"=>$id])){
    header("Location: /phpcrud_film");
}

?>