<?php
require_once 'db.php';
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
$sql = "SELECT username, password, farm_id, owner_name FROM farm WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql);
$statement->execute([$username,$password]);
$user = $statement->fetch();
$farm_id = $user['farm_id'];
$owner_name = $user['owner_name'];
if(isset($farm_id) && isset($owner_name)){
    session_start();
    $_SESSION['farm_id'] = $farm_id;
    $_SESSION['owner_name'] = $owner_name;
    header("Location:edit_farm.php");
}else{
    header("Location:index.php");
}
?>
