<?php
$dsn = 'mysql:host=localhost; dbname=cows_farm';
$username = 'root';
$password = '';
$options = [];

try{
    $connection = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(PDOException $e){
    echo 'connection fail';
}
?>
