<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Mon May 26 2014 17:17:04 GMT+0000 (UTC) -->
<html data-wf-site="538365b95aa5711a549509d5">
<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/registration.css">
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/placeholder/favicon.ico">
</head>
<body>
  <?php require_once('include/register.inc.php'); ?>
  <div class="w-container">
    <section class="section-login">
      <h2>Register Member</h2>
      <div class="w-form">
        <form action='#' method='POST' id="registration-form" name="registration-form" data-name="Registration Form">
          <?php
            if(isset($_SESSION['uid']))
          ?>
          <input class="w-input form-padding" id="fullname" type="text" placeholder="Enter your fullname" name="fullname" data-name="Fullname" required="required">
          <input class="w-input form-padding" id="nickname" type="text" placeholder="Enter your nickname" name="nickname" data-name="Nickname" required="required">
          <input class="w-input form-padding" id="phone" type="text" placeholder="Enter your phone" name="phone" data-name="Phone" required="required">
          <input class="w-input form-padding" id="username" type="text" placeholder="Enter your username" name="username" data-name="Username" required="required">
          <input type="password" class="w-input form-padding" id="password" type="text" placeholder="Enter your password" name="password" data-name="Password" required="required">
          <input class="w-button btn-submit" type="submit" name="submit" value="Submit" data-wait="Please wait...">
        </form>
        <? if(isset($_POST['submit'])){ ?>
          <? if($submitResult){ ?>
            <div class="w-form-done">
              <p>ข้อมูลของคุณถูกบันทึกเรียบร้อยแล้ว ขอบคุณที่ใช้บริการ</p>
              <a href="./login.php">กรุณา login  เข้าใช้งานระบบ </a>
            </div>
          <? } else{ ?>
            <div class="w-form-fail">
              <p>ไม่สามารถสมัครสมาชิกได้ เนื่องจาก Username นี้มีผู้ใช้งานแล้ว</p>
            </div>
          <? } ?>
        <? } ?>
      </div>
    </section>
  </div>

  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>