<?php

require_once '../services/user.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$update_at = date('y-m-d');

updateUser($id, $nom, $prenom, $update_at);
