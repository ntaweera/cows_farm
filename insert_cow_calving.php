<?php
session_start();
require_once 'header.php';
require_once 'navbar.php';
require_once 'db.php';

$message = '';
if (isset ($_POST['submit'])) {
  $cow_label = $_POST['cow_label'];
  $calving_date = $_POST['calving_date'];
  $calf_label = $_POST['calf_label'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $lenght = $_POST['lenght'];
  $chest = $_POST['chest'];

  $sql = 'INSERT INTO cows_calving(cow_label,calving_date,calf_label,gender,weight,height,lenght,chest) VALUES(?,?,?,?,?,?,?,?)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([$cow_label,$calving_date,$calf_label,$gender,$weight,$height,$lenght,$chest])) {
    $message = 'บันทึกข้อมูลเรียบร้อย';
    //header('Location:index.php');
  }
}


?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>บันทึกการคลอดลูก</h3>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="cow_label">เบอร์แม่วัว</label>
          <input type="text" name="cow_label" class="form-control">
        </div>

        <div class="form-group">
          <label for="calving_date">วันเดือนปีคลอด</label>
          <input type="date" name="calving_date" class="form-control">
        </div>

        <div class="form-group">
          <label for="calf_label">เบอร์ลูก</label>
          <input type="text" name="calf_label"  class="form-control">
        </div>

        <div class="form-group">
          <label for="breeding_method">เพศลูก</label><br>
            <input type="radio" name="gender" value="M"  class="">ผู้ <br>
            <input type="radio" name="gender" value="F"  class="">เมีย 
        </div>


        <div class="form-group">
          <label for="weight">น้ำหนักลูก(กก.)</label>
          <input type="number"" name="weight" step="any" class="form-control">
        </div>

        <div class="form-group">
          <label for="height">สูง(ซม.)</label>
          <input type="number"" name="height" class="form-control">
        </div>

        <div class="form-group">
          <label for="lenght">ยาว(ซม.)</label>
          <input type="number"" name="lenght" class="form-control">
        </div>

        <div class="form-group">
          <label for="chest">รอบอก(ซม.)</label>
          <input type="number"" name="chest" class="form-control">
        </div>

             <input type="hidden" name="submit">
        
        <div class="form-group">
          <button type="submit" class="btn btn-info">บันทึกรายการ</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
require_once 'footer.php';
?>