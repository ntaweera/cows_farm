<?php
include("header.php");
include("login_form.php");
$message = "";

if(isset($_POST['submit'])){
    require_once "db.php";
    $owner_name = $_POST['owner_name'];
    $phone_no = $_POST['phone_no'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT) ;
    $sql = "INSERT INTO farm (owner_name, phone_no, password, username) 
    VALUES(:owner_name, :phone_no, :password, :username)";   
    $statement = $connection->prepare($sql);
    if($statement->execute([':owner_name'=>$owner_name,':phone_no'=>$phone_no,':password'=>$password,':username'=>$phone_no])){
        $message = "สมัครสำเร็จ";
        $alert = "success";
        sleep(2);
        session_start();
        $_SESSION["owner_name"] = $owner_name;
        header('Location:edit_farm.php');
    }else{
        $alert = "danger";
        $message = "สมัครไม่สำเร็จ";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md"></div>
        <div class="col-md">
            <div class="card mt-5">
                <div class="card-header">สมัครง่ายและเร็ว</div>
                <div class="card-body">
                    <?php if($message != ''): ?>
                        <div class="alert alert-<?=$alert;?>">
                            <?=$message;?>
                        </div>
                    <?php endif ?>
                    <form name="form1" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="owner_name" placeholder="ชื่อ-นามสกุล" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="phone_no" placeholder="หมายเลขโทรศัพท์มือถือ" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="รูปแบบของเบอร์โทรศัพท์ 000-000-0000" required>
                        </div>
                        <div class="form-group">
                            <input id="pw1" type="password" class="form-control" name="password" placeholder="รหัสผ่าน" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="รหัสผ่านต้องประกอบด้วย ตัวพิมพ์เล็ก ตัวพิมพ์ใหญ่ ตัวเลข และขั้นต่ำ 8 หลัก" required>
                            <input type="hidden" name="submit">
                        </div>
                        <div class="form-group">
                            <input id="pw2" type="password" class="form-control" name="password2" placeholder="ยืนยันรหัสผ่าน" required>
                        </div>
                            <button type="submit" class="btn btn-primary btn-block">สมัครสมาชิก</button>          
                    </form>
                </div>
        </div>
        </div>
        <div class="col-md"></div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("pw1").onchange = validatePassword;
        document.getElementById("pw2").onchange = validatePassword;
    }
    function validatePassword(){
        var pass1=document.getElementById("pw1").value;
        var pass2=document.getElementById("pw2").value;
        if(pass2!=pass1)
            document.getElementById("pw2").setCustomValidity("รหัสผ่านไม่ตรงกัน");
        else
            document.getElementById("pw2").setCustomValidity('');	 
    }
</script>
<?php
include("footer.php");
?>