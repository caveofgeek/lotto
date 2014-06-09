<?php
  @session_start();
  require_once('config.inc.php');
  if(isset($_SESSION['uid'])) goHome();

  if(isset($_POST['submit'])) {
    $username = secure($_POST['username']);
    $password = secure($_POST['password']);
    $password = encrypt($password);

    $result = $db->query("select user_id, permission, fullname, nickname from user where username='{$username}' and password='{$password}'");
    $numrow = $db->numRows($result);
    if($numrow > 0){
      $value = mysql_fetch_object($result);
      $_SESSION['uid'] = $value->user_id;
      $_SESSION['username'] = $value->fullname . " ({$value->nickname})";
      $_SESSION['permission'] = $value->permission;
      goHome();
    }
  }
?>