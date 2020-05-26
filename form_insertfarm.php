<?php
    if(isset($_POST['submit'])){
        require_once 'connect.php';
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone_no = $_POST['phone_no'];
        $password = $_POST['password'];
        $sql = "INSERT INTO farm (firstname, lastname, phone_no, password) 
        VALUES (?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$firstname, $lastname, $phone_no, $password]);
        header('Location:test2.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ระบบฐานข้อมูลฟาร์มวัวเนื้อ</title>
</head>
<body>
    <h1>สร้างบัญชีใหม่</h1>
    <h2>ง่ายและเร็ว</h2>
    <form action="" method="post">
        <br>
        <input type="text" name="firstname" placeholder="ชื่อ">
        <input type="text" name="lastname" placeholder="นามสกุล">
        <br><br>
        <input type="text" name="phone_no" placeholder="หมายเลขโทรศัพท์">
        <br><br>
        <input type="password" name="password" placeholder="รหัสผ่านใหม่">
        <input type="hidden"  name="submit"> 
        <br><br>
        <input type="submit" value="สมัคร">
      </form> 
</body>
</html>