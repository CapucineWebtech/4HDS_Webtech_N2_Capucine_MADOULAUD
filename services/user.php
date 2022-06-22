
<?php
    require_once '../config/pdo.php';
    require_once 'utils.php';

    $conn = connect();
    $dbh = pdo();

    function getAllUsers() {
        global $conn;
        $req = $conn->prepare("SELECT * FROM user;");
        $req->execute();
        $users = $req->fetchAll();
        return $users;
    }

    function getOneUser($id) {
        global $conn;
        $req = $conn->prepare("SELECT * FROM user WHERE id = :id;");
        $req->bindParam(':id', $id);
        $req->execute();
        $user = $req->fetchAll();
        return $user;
    }

    function addUser($nom, $prenom, $roleUser, $token, $created_at) {
        
        global $dbh;

        $sql = "INSERT INTO `user` (`id`, `nom`, `prenom`, `token`, `roleUser`, `created_at`, `update_at`) VALUES (NULL, '".$nom."', '".$prenom."', '".$token."', '".$roleUser."', '".$created_at."', NULL);";
        
        //ne fonctionne pas et je ne comprend pas :
        //
        // $sql = "INSERT INTO user (`nom`, `prenom`, `token`, `roleUser`, `created_at`) 
        //     VALUES(':nom', ':prenom', ':token', ':roleUser', ':created_at')";
        // $req = $conn->prepare($sql);
        // $req->bindValue(':nom', $nom);
        // $req->bindValue(':prenom', $prenom);
        // $req->bindValue(':token', $token);
        // $req->bindValue(':roleUser', $roleUser);
        // $req->bindValue(':created_at', $created_at);

        if ($dbh->query($sql) === TRUE) {
            header('location: /startbootstrap-sb-admin-master/dist/layout-static.php');
        } else {
            echo "Error: " . $sql . "<br>" . $dbh->error;
        }
    }

    function deleteUser($id) {
        
        global $conn;

        $req = $conn->prepare("DELETE FROM user WHERE id = :id;");
        $req->bindParam(':id', $id);
    
        $res = $req->execute();
    
        if ($res !== FALSE) {
            header('location: /startbootstrap-sb-admin-master/dist/layout-static.php');
        }
    }
    
    function updateUser($id, $nom, $prenom, $update_at) {
        
        global $conn;

        $req = $conn->prepare("
            UPDATE user
            SET nom = :nom, prenom = :prenom, update_at = :update_at
            WHERE id = :id;
        ");

        $req->bindParam(':id', $id);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':update_at', $update_at);
    
        $res = $req->execute();
    
        if ($res !== FALSE) {
            header('location: /startbootstrap-sb-admin-master/dist/layout-static.php');
        }
    }
