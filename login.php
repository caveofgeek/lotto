<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Mon May 26 2014 16:49:02 GMT+0000 (UTC) -->
<html data-wf-site="538365b95aa5711a549509d5">
<head>
  <meta charset="utf-8">
  <title>เข้าใช้งานระบบ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/placeholder/favicon.ico">
</head>
<body>
  <?php require_once('include/login.inc.php'); ?>
  <div class="w-container">
    <section class="section-login">
      <h2>เข้าใช้งานระบบ</h2>
      <div class="w-form">
        <form action='#' method='POST'  id="form-login" name="form-login" data-name="Login Form">
          <input class="w-input form-padding" id="username" type="text" placeholder="ชื่อผู้ใช้งานระบบ" name="username" data-name="Username" required="required">
          <input class="w-input form-padding" id="password" type="password" placeholder="รหัสผ่าน" name="password" data-name="Password" required="required">
          <input class="w-button btn-submit" type="submit" name="submit" value="Submit" data-wait="Please wait..."><a class="link-registor" href="registration.php">สมัครสมาชิกใหม่</a>
        </form>
        <? if(isset($_POST['submit'])){ ?>
          <div class="w-form-fail">
            <p>ข้อมูลผิดพลาด กรุณาตรวจสอบใหม่อีกครั้ง</p>
          </div>
        <? } ?>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>