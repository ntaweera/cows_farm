<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" 
          aria-label="Toggle navigation">
    <span class="navbar-toggler-icon navbar-expand-*"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a class="navbar-brand" href="#">ระบบฐานข้อมูลวัวขุนอำเภอคลองหอยโข่ง</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <form action="login.php" method="post">
          <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
          <input type="password" name="password" placeholder="รหัสผ่าน" required>
          <input type="submit" value="ลงชื่อเข้าใช้" class="btn btn-info">
        </form>
      </li>
    </ul>
  </div>  
</nav>