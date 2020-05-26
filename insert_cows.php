<?php
session_start();
require_once 'header.php';
require_once 'navbar.php';
require_once 'db.php';
$datevalid = date('Y-m-d', time());
$message = '';
if (isset ($_POST['submit'])) {
  $cow_label = $_POST['cow_label'];
  $cow_name = $_POST['cow_name'];
  $gender = $_POST['gender'];
  $breeding_id = $_POST['breeding_id'];
  $ox_breeder = $_POST['ox_breeder'];
  $cow_breeder = $_POST['cow_breeder'];
  $date_of_birth = $_POST['date_of_birth'];
  $farm_id = $_SESSION['farm_id'];
  $sql = 'INSERT INTO cows(cow_label,cow_name,gender,breeding_id,ox_breeder,cow_breeder,date_of_birth,farm_id) VALUES(?,?,?,?,?,?,?,?)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([$cow_label,$cow_name,$gender,$breeding_id,$ox_breeder,$cow_breeder,$date_of_birth,$farm_id])) {
    $message = 'บันทึกข้อมูลเรียบร้อย';
    header('Location:index.php');
  }
}

?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>บันทึกประวัติวัว</h3>
    </div>

    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="form-group">
          <label for="cow_label">เบอร์วัว</label>
          <input type="text" name="cow_label" class="form-control">
        </div>
        <div class="form-group">
          <label for="cow_name">ชื่อวัว</label>
          <input type="text" name="cow_name" class="form-control">
        </div>
        <div class="form-group">
        <!-- Default unchecked -->
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultUnchecked" name="gender">
          <label class="custom-control-label" for="defaultUnchecked">ผู้</label>
        </div>

        <!-- Default checked -->
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="defaultChecked" name="gender" checked>
          <label class="custom-control-label" for="defaultChecked">เมีย</label>
        </div>
        </div>

        <div class="form-group">
          <label for="breeding_id">พันธุ์</label>
          <select name="breeding_id" class="form-control">
          <?php
            $sql = "SELECT breeding_id, breeding_name FROM breeding";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $breeding = $statement->fetchAll(PDO::FETCH_OBJ);
            foreach($breeding as $breeding):
          ?>
            <option value="<?=$breeding->breeding_id?>"><?=$breeding->breeding_name?></option>

          <?php endforeach; ?>
          </select>        
        </div>

        <div class="form-group">
          <label for="ox_breeder">เบอร์พ่อ</label>
          <input type="text" name="ox_breeder"  class="form-control">
        </div>
        <div class="form-group">
          <label for="cow_breeder">เบอร์แม่</label>
          <input type="text" name="cow_breeder"  class="form-control">
        </div>

        <div class="form-group">
          <label for="date_of_birth">วันเดือนปีเกิด</label>
          <input type="date" name="date_of_birth" class="form-control" max="<?=$datevalid?>">
        </div>
        <input type="text" name="submit">
        <div class="form-group">
          <button type="submit"  class="btn btn-info">บันทึกรายการ</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
require_once 'footer.php';
?>