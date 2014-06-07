<?php
  @session_start();
  require_once('config.inc.php');
  if(!isset($_SESSION['uid'])) goLogin();

  if(isset($_SESSION['uid'])) { // get user information
    $uid = $_SESSION['uid'];
    $result = $db->query("select * from user where user_id={$uid}");
    while( $row = $db->fetchNextObject($result) ) {
      $fullname = $row->fullname;
      $nickname = $row->nickname;
      $phone    = $row->phone;
      $username = $row->username;
      $password = $row->password;
    }
  }

  if(isset($_POST['submit'])) {
    $fullname = secure($_POST['fullname']);
    $nickname = secure($_POST['nickname']);
    $phone    = secure($_POST['phone']);
    $username = secure($_POST['username']);
    $password = secure($_POST['password']);
    $uid = $_SESSION['uid'];
    $password = encrypt($password);
    $oldpassword = secure($_POST['oldpassword']);
    if (!isset($password) or $password == "") {
      $password = $oldpassword;
    }
    $sql = "UPDATE user SET fullname = '{$fullname}',nickname = '{$nickname}',phone = '{$phone}',password = '{$password}' WHERE user_id = {$uid}" ;
    echo $db->execute($sql);
    if ( $db->execute($sql) ) {
      $result = $db->query("select user_id, permission from user where user_id='{$uid}'");
      $numrow = $db->numRows($result);
      if($numrow > 0){
        $value = mysql_fetch_object($result);
        $_SESSION['uid'] = $value->user_id;
        $_SESSION['fullname'] = $value->fullname + " (" + $value->nickname + ")";
        $_SESSION['permission'] = $value->permission;
        goHome();
      }
    }

  }
?>