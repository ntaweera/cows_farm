<?php
include("header.php");
include("login_form.php");
$message = "";

if(isset($_POST['submit'])){
    require_once "db.php";
    $owner_name = $_POST['owner_name'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    $sql = "INSERT INTO farm (owner_name, phone_no, password, username) 
    VALUES(:owner_name, :phone_no, :password, :username)";   
    $statement = $connection->prepare($sql);
    if($statement->execute([':owner_name'=>$owner_name,':phone_no'=>$phone_no,':password'=>$password,':username'=>$phone_no])){
        $message = "สมัครสำเร็จ";
        sleep(2);
        session_start();
        $_SESSION["owner_name"] = $owner_name;
        header('Location:edit_farm.php');
    }else{
        $message = "สมัครไม่สำเร็จ";
    }
}
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            สมัครง่าย
            และเร็ว
        </div>
        <div class="card-body">
        <?php if(isset($message)): ?>
            <div class="alert alert-success">
            <?=$message;?>
            </div>
            
        <?php endif ?>

            <form name="form1" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="owner_name" placeholder="ชื่อ-นามสกุล">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_no" placeholder="หมายเลขโทรศัพท์มือถือ">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                    <input type="hidden" name="submit">
                </div>
                    <button type="submit" class="btn btn-info">สมัคร</button>          
            </form>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>