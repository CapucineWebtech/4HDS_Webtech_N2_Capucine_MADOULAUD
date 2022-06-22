<?php

require_once '../services/user.php';

$id = $_POST['id'];

deleteUser($id);
