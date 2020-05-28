<?php
    require_once 'db.php';
    $username = $_POST['username'];
    $sql = "SELECT username, password, farm_id, owner_name FROM farm WHERE username = ?";
    $statement = $connection->prepare($sql);
    $statement->execute([$username]);
    $user = $statement->fetch();
    if(password_verify($_POST['password'], $user['password'])){
        session_start();
        $_SESSION['farm_id'] = $user['farm_id'];
        $_SESSION['owner_name'] = $user['owner_name'];
        header("Location:edit_farm.php");
    }else {
        header("Location:index.php");
    }
?>
