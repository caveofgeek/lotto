<div class="fixed-nav">
  <?php
    if (isset($_SESSION['permission']) && $_SESSION['permission'] == "user")
    {
  ?>
      <a class="nav-link" href="#buying-lotto" target="_self">&nbsp;ซื้อหวย</a>
      <a class="nav-link" href="#member-report" target="_self">รายงานการซื้อ</a>
      <a class="nav-link" href="#management-payment">จัดการการชำระเงิน</a>
      <a class="nav-link" href="#check-payment" target="_self">ตรวจสอบการชำระเงิน</a>
  <?php
    }
    else if (isset($_SESSION['permission']) && $_SESSION['permission'] == "admin")
    {
  ?>
      <a class="nav-link" href="#admin-report-buying">รายงานสรุปการซื้อหวย</a>
      <a class="nav-link" href="#management-members">จัดการสมาชิก</a>
  <?php
    }
  ?>
  <a class="nav-link" href="./edit_user.php">แก้ไขข้อมูลส่วนตัว</a>
  <a class="nav-link" href="./logout.php">ออกจากระบบ</a>
</div>