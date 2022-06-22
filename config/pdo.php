<?php 

  function connect() {
    require_once 'config.php';

    try {
      $conn = new PDO($param, $user, $psw, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      if ($conn) {
        echo 'Connected<br><br>';
      }
      return $conn;
    } catch (PDOException $ex) {
      return $conn;
    }
  }


  function pdo() {
    $servername = "localhost";
    $username = "root";
    $dbname = "4hds";
    $password = "";
    $dbh = new mysqli($servername, $username, $password, $dbname);
    if ($dbh->connect_error) {
        die("Connection failed: " . $dbh->connect_error);
    }
    return $dbh;
  }
  