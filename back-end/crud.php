<?php
$servername = "localhost";
$username = "root";
$password = "";
$table = "farm";
try {
    $action =  $_POST["action"];
    $conn = new PDO("mysql:host=$servername;dbname=cows_farm", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!$conn){
        echo "Connection Failed";
        return;
    }

     if($action=="create_table"){
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            farm_id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            farm_name VARCHAR(100) NOT NULL,
            owner_name VARCHAR(100) NOT NULL,
            address1 VARCHAR(255) NOT NULL,
            address2 VARCHAR(255) NOT NULL,
            phone_no VARCHAR(10),
            line_id VARCHAR(50),
            facebook VARCHAR(200),
            username VARCHAR(100),
            password VARCHAR(64))";

        $conn->exec($sql);
        if($conn){
            echo "Create table Complete";
        }
        $conn = null;
        return;
    } 
    
     if($action=="fetch_data"){
        $sql = "select * from $table";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result= $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        $conn = null;
        return;
    } 

    if($action=="add_data"){
        $owner_name = $_POST["owner_name"];
        $phone_no = $_POST["phone_no"];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO $table (owner_name, phone_no, username, password) 
    VALUES(?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$owner_name, $phone_no, $phone_no, $password]);
        $conn = null;
        return;
    }

    if($action=="delete_data"){
        $farm_id = $_POST["farm_id"];
        $sql = "DELETE FROM $table WHERE farm_id = ?";
        $statement=$conn->prepare($sql);
        $statement->execute([$farm_id]);
        $conn = null;
        return;
    }

    if($action=="update_data"){
        $farm_id = $_POST["farm_id"];
        $owner_name = $_POST["owner_name"];
        $phone_no = $_POST["phone_no"];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE $table SET
            owner_name = ?,
            phone_no = ?,
            username = ?,
            password = ?
            WHERE farm_id = ?";
        $statement=$conn->prepare($sql);
        $statement->execute([$owner_name, $phone_no, $phone_no, $password, $farm_id]);
        $conn = null;
        return;
    }

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
