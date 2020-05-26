<?php
include("header.php");
$message = "";
session_start();
require_once "db.php";
$sql = "SELECT MAX(farm_id) as farm_id from farm LIMIT 1";
$statement = $connection->prepare($sql);
$statement->execute();
$farm_arr = $statement->fetch();
$farm_id = $farm_arr['farm_id'];
$owner_name = $_SESSION['owner_name'];
$_SESSION["farm_id"] = $farm_id;


if(isset($_POST['submit'])){
    $farm_name = $_POST['farm_name'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $line_id = $_POST['line_id'];
    $facebook = $_POST['facebook'];
    $sql = "UPDATE farm SET 
    farm_name = :farm_name,
    address1 = :address1,
    address2 = :address2,
    line_id = :line_id,
    facebook = :facebook
    WHERE farm_id = :farm_id";   
    $statement = $connection->prepare($sql);
    if($statement->execute([':farm_name'=>$farm_name,
    ':address1'=>$address1,':address2'=>$address2,
    ':line_id'=>$line_id,':facebook'=>$facebook,':farm_id'=>$farm_id])){
        $message = "ปรับปรุงสำเร็จ";
        sleep(2);
        header('Location:insert_cows.php');
    }else{
        $message = "ปรับปรุงไม่สำเร็จ";
    }
}
require_once 'navbar.php';
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            ปรับปรุงโปรไฟล์
        </div>
        <div class="card-body">
        <?php if(isset($message)): ?>
            <div class="alert alert-success">
            <?=$message;?>
            </div>
            
        <?php endif ?>

            <form name="form1" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="farm_name" placeholder="ชื่อฟาร์ม">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address1" placeholder="ที่อยู่ เลขที่ หมู่ที่ ถนน ตำบล">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address2" value="อ.คลองหอยโข่ง จ.สงขลา" placeholder="อำเภอ จังหวัด">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="line_id" placeholder="Line ID">  
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="facebook" placeholder="facebook">  
                </div>
                    <input type="hidden" name="submit">
                    <button type="submit" class="btn btn-info">ขั้นต่อไป--></button>          
            </form>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>