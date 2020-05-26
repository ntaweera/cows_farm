<?php
session_start();
require_once 'header.php';
require_once 'navbar.php';
require_once 'db.php';
$datevalid = date('Y-m-d', time());


$message = '';
if (isset ($_POST['submit'])) {
  $cow_label = $_POST['cow_label'];
  $seq = $_POST['seq'];
  $breeding_date = $_POST['breeding_date'];
  $ox_label = $_POST['ox_label'];
  $breeding_method = $_POST['breeding_method'];
  $sql = 'INSERT INTO cows_breeding(cow_label,seq,breeding_date,ox_label,breeding_method) VALUES(?,?,?,?,?)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([$cow_label,$seq,$breeding_date,$ox_label,$breeding_method])) {
    $message = 'บันทึกข้อมูลเรียบร้อย';
    //header('Location:index.php');
  }
}


?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h3>บันทึกการผสมพันธุ์</h3>
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
          <input type="text" name="cow_label" class="form-control" required="1">
        </div>
        <div class="form-group">
          <label for="seq">ครั้งที่ผสมพันธุ์</label>
          <input type="number" name="seq" class="form-control">
        </div>
        <div class="form-group">
          <label for="breeding_date">วันเดือนปีผสม</label>
          <input type="date" name="breeding_date" class="form-control" required max="<?=$datevalid ?>">
        </div>

        <div class="form-group">
          <label for="ox_label">เบอร์พ่อ</label>
          <input type="text" name="ox_label"  class="form-control">
        </div>

        <div class="form-group">
          <label for="breeding_method">วิธีผสม</label>
          <select name="breeding_method" class="form-control">
          <?php
            $sql = "SELECT * FROM breeding_method";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $breeding = $statement->fetchAll(PDO::FETCH_OBJ);
            foreach($breeding as $breeding):
          ?>
            <option value="<?=$breeding->method_id?>"><?=$breeding->method?></option>

          <?php endforeach; ?>
          </select>        
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