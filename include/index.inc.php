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

  if(isset($_POST['confirm_lotto'])) {
    if(isset($_POST['lotto_data'])) {
      $sql = "INSERT INTO  buy ( buy_time , user_id ,  buy_status ) VALUES (CURDATE(),{$_SESSION['uid']},'N')";
      if ($db->execute($sql)) {
        $buy_id = $db->lastInsertedId();
        foreach ($_POST['lotto_data'] as $row) {
          $lotto = split(",",$row);
          $time = strtotime($lotto[0]);
          $newformat = date('Y-m-d',$time);
          $date_cycle = $newformat;
          $type = $lotto[1];
          $pos = $lotto[2];
          $buy_type = $type == 3 ? $lotto[3] : "NULL";
          $num = $lotto[4];
          $price = $lotto[5];
          $sql = "INSERT INTO lotto (buy_id, buy_cycle, lotto_number, lotto_typedigit, lotto_pos, lotto_pay, lotto_price)
                VALUES ({$buy_id},'{$date_cycle}',{$num},{$type},'{$pos}','{$buy_type}',{$price})";
          $db->execute($sql);
        }
      }
    }
  }
?>