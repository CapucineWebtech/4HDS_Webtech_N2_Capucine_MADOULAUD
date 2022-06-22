<?php

require_once '../services/user.php';
require_once '../services/utils.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$roleUser = "USER";
$token = randomToken(64);
$created_at = date('y-m-d');

addUser($nom, $prenom, $roleUser, $token, $created_at);
