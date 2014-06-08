<?php
  @session_start();
  require_once('config.inc.php');
  if(!isset($_SESSION['uid'])) goLogin();

  // Retrieve user count.
  $result = $db->query("select * from user");
  $member_count = $db->numRows($result);

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

  if(isset($_POST['sub_manage_user'])) {
    // Delete member.
    $elems = implode(',', $_POST['del_member']);
    $db->execute("delete from user where user_id in({$elems})");

    // Remove deleted user from permission array.
    $permission = array_diff($_POST['permission'], $_POST['del_member']);
    $elems = implode(',', $permission);
    $db->execute("update user set permission='admin' where user_id in({$elems})");
  }
?>