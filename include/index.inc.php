<?php
  @session_start();
  require_once('config.inc.php');
  if(!isset($_SESSION['uid'])) goLogin();

  if(isset($_POST['submit'])) {
    $fullname = secure($_POST['fullname']);
    $nickname = secure($_POST['nickname']);
    $phone    = secure($_POST['phone']);
    $username = secure($_POST['username']);
    $password = secure($_POST['password']);
    $password = encrypt($password);

    $result = $db->query("select * from user where username='{$username}'");
    $numrow = $db->numRows($result);
    if($numrow <= 0)
    {
      $db->execute("insert into user values(null,'{$fullname}','{$nickname}','{$phone}','{$username}','{$password}','user')");
      $submitResult = true;
    }
  }
?>