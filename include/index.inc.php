<?php
  @session_start();
  require_once('config.inc.php');
  if(!isset($_SESSION['uid'])) goLogin();

  /**
  * action when add or update data
  **/

  // add lotto
  if(isset($_POST['confirm_lotto'])) {
    if(isset($_POST['lotto_data'])) {
      $sql = "insert into  buy ( buy_time , user_id)
              values (CURDATE(),{$_SESSION['uid']})";

      if($db->execute($sql)) {
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

          $sql = "insert into lotto (buy_id, buy_cycle, lotto_number,
                  lotto_typedigit, lotto_pos, lotto_pay, lotto_price, buy_status)
                  values ({$buy_id},'{$date_cycle}',{$num},{$type},'{$pos}',
                  '{$buy_type}',{$price},'N')";

          $db->execute($sql);
          $db->lastResult = NULL;
        }
      }
    }
  }
  // Management member
  else if(isset($_POST['sub_manage_user'])) {
    // Delete member.
    $elems = implode(',', $_POST['del_member']);
    $db->execute("delete from user where user_id in({$elems})");

    // Remove deleted user from permission array.
    $permission = array_diff($_POST['permission'], $_POST['del_member']);
    $elems = implode(',', $permission);
    $sql = "update user set permission='admin' where user_id in({$elems})";
    $db->execute($sql);
    $db->lastResult = NULL;
  }
  // manage payment
  else if(isset($_POST['sub_manage_payment'])) {
    $elems = implode(',', $_POST['confirm_payment']);
    $db->execute("update lotto set buy_status='Y' where lotto_id in({$elems})");
  }

  /**
  * end add or update action
  **/

  /**
  * query for get default data
  **/

  // Retrieve user count.
  $result = $db->query("select * from user");
  $member_count = $db->numRows($result);

  // get current cycle date
  $month = date("m");
  $year =date("Y");
  if ($month < 10) $nextmonth = "0".($month + 1);
  $cycle1 = "01/".$month."/".$year;
  $cycle2 = "16/".$month."/".$year;
  $nextcycle = "01/".$nextmonth."/".$year;

  // get buying data
  $sql = "select distinct buy_time from buy
          where user_id = {$_SESSION['uid']}
          order by buy_time desc";
  $buy_result = $db->query($sql);
  $db->lastResult = NULL;

  // get default buying-data
  $sql = "select buy_cycle,buy_time,lotto_pos,lotto_typedigit,lotto_number,lotto_pay
          ,count(lotto_number) 'qty_lotto',sum(lotto_price) 'lotto_price'
          from lotto,buy where lotto.buy_id = buy.buy_id
          and user_id = {$_SESSION['uid']}
          group by buy_cycle,buy_time,lotto_pos,lotto_typedigit,lotto_number,lotto_pay
          order by buy.buy_time LIMIT 20";
  $search_result = $db->query($sql);
  $db->lastResult = NULL;

  // get default payment-status
  $sql = "select buy.buy_id, buy.buy_time,
          count(lotto.lotto_number) count_lotto,
          sum(lotto.lotto_price) sum_price
          from lotto, buy
          where lotto.buy_id = buy.buy_id
          and user_id = {$_SESSION['uid']}
          group by buy.buy_id, buy.buy_time
          order by buy.buy_time";
  $payment_result = $db->query($sql);
  $db->lastResult = NULL;

  // get buying data for Admin
  $sql = "select distinct buy_time from buy order by buy_time desc";
  $admin_buy_result = $db->query($sql);
  $db->lastResult = NULL;

  $sql = "select * from user where permission <> 'admin'";
  $admin_user = $db->query($sql);
  $db->lastResult = NULL;

  // get default buying-data for admin
  $sql = "select buy_cycle,buy_time,lotto_pos,lotto_typedigit,lotto_number,lotto_pay
          ,user.fullname
          ,count(lotto_number) 'qty_lotto',sum(lotto_price) 'lotto_price'
          ,case buy_status when 'Y' then sum(lotto_price) end 'pay_lotto'
          from lotto,buy,user where lotto.buy_id = buy.buy_id and buy.user_id = user.user_id
          group by buy_cycle,buy_time,lotto_pos,lotto_typedigit,lotto_number
          ,lotto_pay,user.fullname
          order by buy.buy_time,user.fullname";
  $search_admin_result = $db->query($sql);
  $db->lastResult = NULL;

  // Get unpaid payment for admin
  $sql = "select * from lotto l join buy b on l.buy_id = b.buy_id
          where buy_status = 'N' and user_id = {$_SESSION['uid']}
          order by buy_time";
  $unpaid_lotto_result = $db->query($sql);
  $db->lastResult = NULL;

  // Get all member data
  $sql = "select * from user
          where user_id != {$_SESSION['uid']}
          and permission != 'admin'";
  $members = $db->query($sql);
  $db->lastResult = NULL;

  /**
  * end query
  **/

  /**
  * action when search data
  **/

   //show buying lotto
  if(isset($_POST['sub_user_report'])) {
    $search_date = trim($_POST['find_date']);
    $type = $_POST['char'];
    $pos = $_POST['pos'];
    $buy_type = $type == 3 ? $_POST['typepay'] : "";
    $search_sql = "select buy_cycle,buy_time,lotto_pos,lotto_typedigit
                  ,lotto_number,lotto_pay,count(lotto_number) 'qty_lotto'
                  ,sum(lotto_price) 'lotto_price'
                  from lotto,buy where lotto.buy_id = buy.buy_id
                  and user_id = " . $_SESSION['uid'];

    if($search_date <> "" && $search_date <> "All") {
      $search_sql .= " and date(buy.buy_time) = date('{$search_date}')";
    }

    if($type <> "") $search_sql .= " and lotto.lotto_typedigit = {$type}";
    if($pos <> "") $search_sql .= " and lotto.lotto_pos = '{$pos}'";
    if($buy_type <> "") $search_sql .= " and lotto.lotto_pay = '{$buy_type}'";

    $search_sql .= " group by buy_cycle,buy_time,lotto_pos,lotto_typedigit
                  ,lotto_number,lotto_pay";

    $search_result = $db->query($search_sql);
    $db->lastResult = NULL;
  }
  //show payment
  else if(isset($_POST['search_lotto_payment'])) {
    $search_date = trim($_POST['find_date2']);

    $sql = "select buy.buy_id, buy.buy_time, count(lotto.lotto_number)
            count_lotto, sum(lotto.lotto_price) sum_price,buy.buy_status
            from lotto, buy
            where lotto.buy_id = buy.buy_id";
    if ($search_date <> "" && $search_date <> "All") {
      $sql .= " and date(buy.buy_time) = date('{$search_date}')";
    }
    $sql .= " and user_id = {$_SESSION['uid']}
            group by buy.buy_id, buy.buy_time ";


    $payment_result = $db->query($sql);
    $db->lastResult = NULL;
  }
  // show user's buying for ADmin
  else if(isset($_POST['search_lotto_admin'])) {
    $search_date = trim($_POST['find_date3']);
    $user_id = $_POST['user'];
    $type = $_POST['char'];
    $pos = $_POST['pos'];
    $buy_type = $type == 3 ? $_POST['typepay'] : "";
    $search_sql = "select buy_cycle,buy_time,lotto_pos,lotto_typedigit
                ,lotto_number,lotto_pay,user.fullname,count(lotto_number) 'qty_lotto'
                ,sum(lotto_price) 'lotto_price'
                ,case buy_status when 'Y' then sum(lotto_price) end 'pay_lotto'
                from lotto,buy,user
                where lotto.buy_id = buy.buy_id and buy.user_id = user.user_id";

    if($search_date <> "" && $search_date <> "All")
      $search_sql .= " and date(buy.buy_time) = date('{$search_date}')";
    if($type <> "") $search_sql .= " and lotto.lotto_typedigit = {$type}";
    if($pos <> "") $search_sql .= " and lotto.lotto_pos = '{$pos}'";
    if($buy_type <> "") $search_sql .= " and lotto.lotto_pay = '{$buy_type}'";
    if($user_id <> "" && $user_id <> "all")
      $search_sql .= " and buy.user_id = '{$user_id}'";

    $search_sql .= " group by buy_cycle,buy_time,lotto_pos,lotto_typedigit
                ,lotto_number,lotto_pay,user.fullname";
    $search_sql .= " order by buy.buy_time,user.fullname";

    $search_admin_result = $db->query($search_sql);
    $db->lastResult = NULL;
  }

  /**
  * end search action
  **/
?>