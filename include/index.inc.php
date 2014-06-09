<?php
  @session_start();
  require_once('config.inc.php');
  if(!isset($_SESSION['uid'])) goLogin();

  // Retrieve user count.
  $result = $db->query("select * from user");
  $member_count = $db->numRows($result);

  // get current cycle date
  $month_year = date("m/Y");
  $cycle1 = "01/".$month_year;
  $cycle2 = "16/".$month_year;

  // get buying data
  $sql = "select distinct buy_time from buy where user_id = {$_SESSION['uid']}";
  $buy_result = $db->query($sql);
  $db->lastResult = NULL;

  // get default buying-data
  $sql = "select * from lotto,buy where lotto.buy_id = buy.buy_id and user_id = " . $_SESSION['uid'] ." order by buy.buy_time DESC LIMIT 20 ";
  $search_result = $db->query($sql);
  $db->lastResult = NULL;

  // get default payment-status
  $sql = "select buy.buy_id, buy.buy_time, count(lotto.lotto_number) count_lotto
            , sum(lotto.lotto_price) sum_price,buy.buy_status
            from lotto, buy
            where lotto.buy_id = buy.buy_id and
            user_id = {$_SESSION['uid']} and buy.buy_status = 'N'
            group by buy.buy_id, buy.buy_time ";
  $payment_result = $db->query($sql);
  $db->lastResult = NULL;


  // add lotto
  if(isset($_POST['confirm_lotto'])) {
    if(isset($_POST['lotto_data'])) {
      $sql = "INSERT INTO  buy ( buy_time , user_id ,  buy_status ) VALUES (CURDATE(),{$_SESSION['uid']},'N')";
      if ($db->execute($sql)) {
        $buy_id = $db->lastInsertedId();
        foreach ($_POST['lotto_data'] as $row) {
          $lotto = split(",",$row);
          $time = strtotime($lotto[0]);
          $newformat = date('Y-d-m',$time);
          $date_cycle = $newformat;
          $type = $lotto[1];
          $pos = $lotto[2];
          $buy_type = $type == 3 ? $lotto[3] : "NULL";
          $num = $lotto[4];
          $price = $lotto[5];
          $sql = "INSERT INTO lotto (buy_id, buy_cycle, lotto_number, lotto_typedigit, lotto_pos, lotto_pay, lotto_price)
                VALUES ({$buy_id},'{$date_cycle}',{$num},{$type},'{$pos}','{$buy_type}',{$price})";
          $db->execute($sql);
          $db->lastResult = NULL;
        }
      }
    }
  }
  //show buying lotto
  else if(isset($_POST['sub_user_report'])) {
    $search_date = trim($_POST['find_date']);
    $type = $_POST['char'];
    $pos = $_POST['pos'];
    $buy_type = $type == 3 ? $_POST['typepay'] : "";
    $serach_sql = "";

    if ($search_date <> "") {
      $search_sql = "select * from lotto,buy where lotto.buy_id = buy.buy_id and date(buy.buy_time) = date('{$search_date}') and user_id = " . $_SESSION['uid'];
    }

    if ($type <> "") {
      $search_sql .= " and lotto.lotto_typedigit = {$type}";
    }

    if ($pos <> "") {
      $search_sql .= " and lotto.lotto_pos = '{$pos}'";
    }

    if ($buy_type <> "") {
      $search_sql .= " and lotto.lotto_pay = '{$buy_type}'";
    }

    $search_result = $db->query($search_sql);
    $db->lastResult = NULL;
  }
  //show payment
  else if(isset($_POST['search_lotto_payment'])) {
    $search_date = trim($_POST['find_date2']);

    $sql = "select buy.buy_id, buy.buy_time, count(lotto.lotto_number) count_lotto
            , sum(lotto.lotto_price) sum_price,buy.buy_status
            from lotto, buy
            where lotto.buy_id = buy.buy_id
            and date(buy.buy_time) = date('{$search_date}') and user_id = {$_SESSION['uid']}
            group by buy.buy_id, buy.buy_time ";

    $payment_result = $db->query($sql);
    $db->lastResult = NULL;
  }
  // Management member
  else if(isset($_POST['sub_manage_user'])) {
    // Delete member.
    $elems = implode(',', $_POST['del_member']);
    $db->execute("delete from user where user_id in({$elems})");

    // Remove deleted user from permission array.
    $permission = array_diff($_POST['permission'], $_POST['del_member']);
    $elems = implode(',', $permission);
    $db->execute("update user set permission='admin' where user_id in({$elems})");
    $db->lastResult = NULL;
  }
?>