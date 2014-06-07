<div class="fixed-nav">
  <img class="logo" src="images/logo-img.png" width="268px" alt="51e1a871bceaf5b67b000052_logo-img.png">
  <?php
    if (isset($_SESSION['permission']) && $_SESSION['permission'] == "user")
    {
  ?>
      <a class="nav-link" href="#buying-lotto" target="_self">&nbsp;ซื้อหวย(สมาชิก)</a>
      <a class="nav-link" href="#member-report" target="_self">รายงานการซื้อ(สมาชิก)</a>
      <a class="nav-link" href="#check-payment" target="_self">ตรวจสอบการชำระเงิน(ชำระเงิน)</a>
  <?php
    }
    else if (isset($_SESSION['permission']) && $_SESSION['permission'] == "admin")
    {
  ?>
      <a class="nav-link" href="#admin-report-buying">รายงานสรุปการซื้อหวย(ADMIN)</a>
      <a class="nav-link" href="#management-payment">จัดการการชำระเงิน(ADMIN)</a>
      <a class="nav-link" href="#management-members">จัดการสมาชิก (ADMIN)</a>
  <?php
    }
  ?>
  <a class="nav-link" href="./logout.php">ออกจากระบบ</a>
</div>