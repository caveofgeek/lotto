<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue May 27 2014 17:06:05 GMT+0000 (UTC) -->
<html data-wf-site="5384ab401fae7daf76e9d624">
<head>
  <meta charset="utf-8">
  <title>ระบบจัดการหวย</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="apple-touch-icon" href="https://y7v4p6k4.ssl.hwcdn.net/51e1a6dc3bc6b24571000014/51e1ba063522c7b57b000061_thumbnail-starter.png">
</head>
<body>
  <?php require_once('include/index.inc.php'); ?>
  <div class="w-row">
    <div class="w-col w-col-3 left-sidebar">
      <?php include "./navbar.php" ?>
    </div>
    <div class="w-col w-col-9 content-column">
      <?php
          if (isset($_SESSION['permission']) && $_SESSION['permission'] == "user")
          {
        ?>
            <div class="w-clearfix content-block">
              <h1 id="buying-lotto">ซื้อหวย</h1>

              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="buy-lotto" action="index.php#buying-lotto" method="post" name="buy-lotto" data-name="Lotto Buying Form">
                        <label for="name">งวดที่ซื้อ</label>
                        <select class="w-select small-size" id="date_lotto" name="date_lotto">
                          <?php
                            if (date('d') == "01")
                            {
                              echo '<option value='.$cycle1.'>'.$cycle1.'</option>';
                            }
                            if (date('d') <= 16)
                            {
                              echo '<option value='.$cycle2.'>'.$cycle2.'</option>';
                              echo '<option value='.$nextcycle.'>'.$nextcycle.'</option>';
                            }
                            else
                            {
                              echo '<option value='.$nextcycle.'>'.$nextcycle.'</option>';
                            }
                          ?>
                        </select>
                        <label for="2char">ประเภทหวยที่ซื้อ&nbsp;&nbsp;( 2 หรือ 3 ตัว )</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="2char" type="radio" name="char" value="2" data-name="2char" checked="true">
                            <label class="w-form-label" for="radio">2 ตัว</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="3char" type="radio" name="char" value="3" data-name="3char">
                            <label class="w-form-label" for="radio">3 ตัว</label>
                          </div>
                        </div>
                        <label for="radio">ตำแหน่งที่ซื้อ</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="up" type="radio" name="pos" value="up" data-name="up" checked="true">
                            <label class="w-form-label" for="radio">บน</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="down" type="radio" name="pos" value="down" data-name="down">
                            <label class="w-form-label" for="radio">ล่าง</label>
                          </div>
                        </div>
                        <label class="type-for-3char" for="radio">ประเภทสำหรับการซื้อ เฉพาะ 3 ตัวเท่านั้น</label>
                        <div class="w-clearfix type-for-3char">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="teng" type="radio" name="typepay" value="teng" data-name="teng" checked="true">
                            <label class="w-form-label" for="radio">เต้ง</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="tod" type="radio" name="typepay" value="tod" data-name="tod">
                            <label class="w-form-label" for="radio">โต๊ด</label>
                          </div>
                        </div>

                        <label for="number">ใส่เลขที่ต้องการซื้อ</label>
                        <input class="w-input small-size" id="number" type="text" placeholder="ใส่ตัวเลข" name="number" data-name="number" minlength="2" maxlength="2">
                        <p id="alert-number" class="helper">กรุณาระบุตัวเลข หรือ ระบุตัวเลขให้ตรงตามประเภทที่ซื้อเท่านั้น</p>
                        <label for="price">จำนวนเงิน(บาท)</label>
                        <input class="w-input small-size" id="price" type="text" placeholder="ใส่จำนวนเงิน" name="price" data-name="price">
                        <p id="alert-price" class="helper">กรุณาระบุราคาเป็นตัวเลขเท่านั้น</p>
                        <input class="w-button" id="sub_add_lotto" name="sub_add_lotto" type="submit" value="บันทึก" disabled>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-lotto">
                    <h4>รายการซื้อของ <?php echo $_SESSION['username']; ?></h4>
                    <div class="w-embed">
                      <table class="table table-condensed" id="table-lotto">
                        <thead>
                          <tr>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    <div class="summary" id="sum-user-lotto">
                      <span class="sum_topic"></span><span class="qty"></span><span class="total_price"></span>
                    </div>
                    <div class="w-embed btn-confirm">
                      <form id="confirm-lotto" action="#" method="post" name="confirm-lotto" data-name="Lotto Confirm Form">
                        <div></div>
                        <input class="w-button" id="confirm_lotto" name="confirm_lotto" type="submit" value="ยืนยันการสั่งซื้อ">
                        <input class="w-button" id="print_lotto" name="print_lotto" type="submit" value="ปริ้น">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="member-report">ค้นหารายการซื้อของ <?php echo $_SESSION['username']; ?></h1>

              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="report-user" action="index.php#member-report" method="post" name="report-user" data-name="report-user">
                        <label for="radio">ค้นหาจากวันทีซื้อ</label>
                        <select class="w-select small-size" id="find_date" name="find_date">
                          <?php
                            echo "<option value='All'>ทั้งหมด</option>";
                            while($row = $db->fetchNextObject($buy_result)) {
                              $time = strtotime($row->buy_time);
                              $newformat = date('d/m/Y',$time);
                              echo "<option value='{$row->buy_time}'>{$newformat}</option>";
                            }
                            $db->resetFetch($buy_result);
                          ?>
                        </select>
                        <label for="2char2">ประเภทหวยที่ซื้อ&nbsp;&nbsp;( 2 หรือ 3 ตัว )</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="2char2" type="radio" name="char" value="2" data-name="2char2">
                            <label class="w-form-label" for="2char2">2 ตัว</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="3char2" type="radio" name="char" value="3" data-name="3char2">
                            <label class="w-form-label" for="3char2">3 ตัว</label>
                          </div>
                        </div>
                        <label for="radio">ตำแหน่งที่ซื้อ</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="up" type="radio" name="pos" value="up" data-name="up">
                            <label class="w-form-label" for="radio">บน</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="down" type="radio" name="pos" value="down" data-name="down">
                            <label class="w-form-label" for="radio">ล่าง</label>
                          </div>
                        </div>
                        <label class="type-for-3char2" for="radio">ประเภทสำหรับการซื้อ เฉพาะ 3 ตัวเท่านั้น</label>
                        <div class="w-clearfix type-for-3char2">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="teng" type="radio" name="typepay" value="teng" data-name="teng" checked="true">
                            <label class="w-form-label" for="radio">เต้ง</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="tod" type="radio" name="typepay" value="tod" data-name="tod">
                            <label class="w-form-label" for="radio">โต๊ด</label>
                          </div>
                        </div>
                        <input class="w-button" id="sub_user_report" name="sub_user_report" type="submit" value="ค้นหา" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-user-buying">
                    <h4>รายงานสรุปการซื้อของ <?php echo $_SESSION['username']; ?></h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>วันที่ซื้อ</th>
                            <th>งวดที่ซื้อ</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>จำนวนที่ซื้อ</th>
                            <th>ราคารวม ( บาท )</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                            $total = 0;
                            $rows = 0;
                            if ($db->numRows($search_result) > 0) {
                              while($row = $db->fetchNextObject($search_result))
                              {
                                if ($row->lotto_typedigit <= 2) {
                                  $pay_type = "-";
                                }
                                else{
                                  $pay_type = $row->lotto_pay == "teng" ? "เต้ง" : "โต๊ด";
                                }

                                $time = strtotime($row->buy_cycle);
                                $newformat_cycle = date('d/m/Y',$time);
                                $time2 = strtotime($row->buy_time);
                                $newformat_cycle2 = date('d/m/Y',$time2);
                                $pos = $row->lotto_pos == "up" ? "บน" : "ล่าง" ;
                                $price = number_format($row->lotto_price);
                                $total += $row->lotto_price;
                                $rows += $row->qty_lotto;
                                echo "<tr>";
                                echo "  <td>{$newformat_cycle2}</td>";
                                echo "  <td>{$newformat_cycle}</td>";
                                echo "  <td>{$row->lotto_typedigit} ตัว</td>";
                                echo "  <td>{$pos}</td>";
                                echo "  <td>{$pay_type}</td>";
                                echo "  <td>{$row->lotto_number}</td>";
                                echo "  <td>{$row->qty_lotto}</td>";
                                echo "  <td>{$price}</td>";
                                echo "</tr>";
                              }
                              $db->resetFetch($search_result);
                            }
                          ?>
                          </tr>
                        </tbody>
                      </table>
                      <div class="summary">
                        <span class="sum_topic">รวมทั้งสิ้น ​</span>
                        <span class="qty"><?php echo $rows; ?> รายการ</span>
                        <span class="total_price"><?php echo number_format($total); ?> บาท</span>
                      </div>
                      <input class="w-button" id="print_user_buying" name="print_user_buying" type="submit" value="ปริ้น">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="management-payment">จัดการการชำระเงิน</h1>

              <div>
                <h4>รายการที่ยังไม่ได้ชำระเงิน</h4>
                <div class="w-form">
                  <form action="index.php#management-payment" id="manage-payment" name="manage-payment" method="post" action="index.php#management-payment" data-name="Manage Payment Form">
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>วันที่ซื้อ</th>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                            <th>ยืนยันการชำระเงิน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            while ($row = $db->fetchNextObject($unpaid_lotto_result)) {
                              $time = strtotime($row->buy_cycle);
                              $newformat_cycle = date('d/m/Y',$time);
                              $time2 = strtotime($row->buy_time);
                              $newformat_time = date('d/m/Y',$time2);
                              $pos = $row->lotto_pos == "up" ? "บน" : "ล่าง";

                              if ($row->lotto_typedigit <= 2) $pay_type = "-";
                              else $pay_type = $row->lotto_pay == "teng" ? "เต้ง" : "โต๊ด";

                              $price = number_format($row->lotto_price);
                          ?>
                            <tr>
                              <td><? echo $newformat_time; ?></td>
                              <td><? echo $newformat_cycle; ?></td>
                              <td><? echo $row->lotto_typedigit; ?> ตัว</td>
                              <td><? echo $pos; ?></td>
                              <td><? echo $pay_type; ?></td>
                              <td><? echo $row->lotto_number; ?></td>
                              <td><? echo $price; ?></td>
                              <td><input type="checkbox" name="confirm_payment[]" value="<? echo $row->lotto_id; ?>"></td>
                            </tr>
                          <? } ?>
                        </tbody>
                      </table>
                    </div>
                    <input class="w-button btn-confirm-cash" id="sub_manage_payment" name="sub_manage_payment" type="submit" value="บันทึก" data-wait="Please wait...">
                  </form>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="check-payment">ตรวจสอบการชำระเงิน</h1>

              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="check-payment-form" method="post" action="index.php#check-payment" name="check-payment-form" data-name="Check Payment Form">
                        <label for="find_date">ค้นหาจากวันที่ซื้อ</label>
                        <select class="w-select small-size" id="find_date2" name="find_date2">
                          <?php
                            echo "<option value='All'>ทั้งหมด</option>";
                            while($row = $db->fetchNextObject($buy_result)) {
                              $time = strtotime($row->buy_time);
                              $newformat = date('d/m/Y',$time);
                              echo "<option value='{$row->buy_time}'>{$newformat}</option>";
                            }
                            $db->resetFetch($buy_result);
                          ?>
                        </select>
                        <input class="w-button" id="search_lotto_payment" name="search_lotto_payment" type="submit" value="ค้นหา" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-user-payment">
                    <h4>รายงานการชำระเงินของ <?php echo $_SESSION['username']; ?></h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>วันที่ซื้อ</th>
                            <th>การซื้อครั้งที่</th>
                            <th>จำนวนรายการที่ซื้อ</th>
                            <th>ยังไม่ได้ชำระ</th>
                            <th>ชำระแล้ว</th>
                            <th>ราคารวมทั้งสิ้น</th>
                            <th>สถานะการชำระเงิน</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $runno = 1;
                            while($row = $db->fetchNextObject($payment_result)) {
                              $time = strtotime($row->buy_time);
                              $newformat = date('d/m/Y',$time);
                              $get_unsuccesspay = "select sum(lotto_price) from lotto where buy_id = " . $row->buy_id ." and buy_status = 'N'";
                              $get_successpay = "select sum(lotto_price) from lotto where buy_id = " . $row->buy_id ." and buy_status = 'Y'";
                              $status = $row->buy_status == "N" ? "ยังไม่ได้ชำระ" : "ชำระเรียบร้อยแล้ว";
                              $count_lotto = number_format($row->count_lotto);
                              $amount = number_format($row->sum_price);
                              $unpay = number_format($db->queryUniqueValue($get_unsuccesspay));
                              $pay = number_format($db->queryUniqueValue($get_successpay));
                              $status = $amount == $pay ? "ชำระเรียบร้อยแล้ว" : "ยังไม่ได้ชำระ" ;
                              echo "<tr>";
                              echo "  <td>{$newformat}</td>";
                              echo "  <td>{$runno}</td>";
                              echo "  <td>{$count_lotto}</td>";
                              echo "  <td>{$unpay}</td>";
                              echo "  <td>{$pay}</td>";
                              echo "  <td>{$amount}</td>";
                              echo "  <td>{$status}</td>";
                              echo "</tr>";
                              $runno++;
                            }
                            $db->resetFetch($payment_result);
                          ?>
                        </tbody>
                      </table>
                      <input class="w-button" id="print_user_payment" name="print_user_payment" type="submit" value="ปริ้น">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
          else if (isset($_SESSION['permission']) && $_SESSION['permission'] == "admin")
          {
        ?>
            <div class="w-clearfix content-block">
              <h1 id="admin-report-buying">รายงานสรุปการซื้อหวย</h1>

              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="result-buying" name="result-buying" method="post" action="index.php#admin-report-buying" data-name="Result Form">
                        <label for="radio">ค้นหาจากวันที่ซื้อ</label>
                        <select class="w-select small-size" id="find_date3" name="find_date3">
                          <?php
                           echo "<option value='All'>ทั้งหมด</option>";
                            while($row = $db->fetchNextObject($admin_buy_result)) {
                              $time = strtotime($row->buy_time);
                              $newformat = date('d/m/Y',$time);
                              echo "<option value='{$row->buy_time}'>{$newformat}</option>";
                            }
                            $db->resetFetch($admin_buy_result);
                          ?>
                        </select>

                        <label for="radio">ค้นหาจากซื้อผู้ใช้งาน</label>
                        <select class="w-select small-size" id="user" name="user">
                          <?php
                            echo "<option value='all'>ทั้งหมด</option>";
                            while($row = $db->fetchNextObject($admin_user)) {
                              echo "<option value='{$row->user_id}'>{$row->fullname}</option>";
                            }
                            $db->resetFetch($admin_buy_result);
                          ?>
                        </select>
                        <label for="2char4">ประเภทหวยที่ซื้อ&nbsp;&nbsp;( 2 หรือ 3 ตัว )</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="2char4" type="radio" name="char" value="2" data-name="2char4">
                            <label class="w-form-label" for="2char4">2 ตัว</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="3char4" type="radio" name="char" value="3" data-name="3char4">
                            <label class="w-form-label" for="3char4">3 ตัว</label>
                          </div>
                        </div>
                        <label for="radio">ตำแหน่งที่ซื้อ</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="up" type="radio" name="pos" value="up" data-name="up">
                            <label class="w-form-label" for="radio">บน</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="down" type="radio" name="pos" value="down" data-name="down">
                            <label class="w-form-label" for="radio">ล่าง</label>
                          </div>
                        </div>
                        <label class="type-for-3char4" for="radio">ประเภทสำหรับการซื้อ เฉพาะ 3 ตัวเท่านั้น</label>
                        <div class="w-clearfix type-for-3char4">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="teng" type="radio" name="typepay" value="teng" data-name="teng" checked="true">
                            <label class="w-form-label" for="radio">เต้ง</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="tod" type="radio" name="typepay" value="tod" data-name="tod">
                            <label class="w-form-label" for="radio">โต๊ด</label>
                          </div>
                        </div>
                        <input class="w-button" id="search-lotto-admin" name="search_lotto_admin" type="submit" value="ค้นหา" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="report-buying">
                    <h4>รายงานสรุปการซื้อ</h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>วันทีซื้อ</th>
                            <th>งวดที่ซื้อ</th>
                            <th>ผู้ซื้อ</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>จำนวนที่ซื้อ</th>
                            <th>ยังไม่ชำระ</th>
                            <th>ชำระแล้ว</th>
                            <th>ราคารวม ( บาท )</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $total = 0;
                            $rows = 0;
                            if ($db->numRows($search_admin_result) > 0) {
                              while($row = $db->fetchNextObject($search_admin_result))
                              {
                                if ($row->lotto_typedigit <= 2) {
                                  $pay_type = "-";
                                }
                                else{
                                  $pay_type = $row->lotto_pay == "teng" ? "เต้ง" : "โต๊ด";
                                }

                                $time = strtotime($row->buy_cycle);
                                $newformat_cycle = date('d/m/Y',$time);
                                $time2 = strtotime($row->buy_time);
                                $newformat_cycle2 = date('d/m/Y',$time2);
                                $pos = $row->lotto_pos == "up" ? "บน" : "ล่าง" ;
                                $price = number_format($row->lotto_price);
                                $total += $row->lotto_price;
                                $pay = number_format($row->pay_lotto);
                                $rows+= $row->qty_lotto;
                                $unpay = number_format(($row->lotto_price - $row->pay_lotto));
                                echo "<tr>";
                                echo "  <td>{$newformat_cycle2}</td>";
                                echo "  <td>{$newformat_cycle}</td>";
                                echo "  <td>{$row->fullname}</td>";
                                echo "  <td>{$row->lotto_typedigit} ตัว</td>";
                                echo "  <td>{$pos}</td>";
                                echo "  <td>{$pay_type}</td>";
                                echo "  <td>{$row->lotto_number}</td>";
                                echo "  <td>{$row->qty_lotto}</td>";
                                echo "  <td>{$unpay}</td>";
                                echo "  <td>{$pay}</td>";
                                echo "  <td>{$price}</td>";
                                echo "</tr>";
                              }
                              $db->resetFetch($search_admin_result);
                            }
                          ?>
                        </tbody>
                      </table>
                      <div class="summary">
                        <span class="sum_topic">รวมทั้งสิ้น ​</span>
                        <span class="qty"><?php echo $rows; ?> รายการ</span>
                        <span class="total_price"><?php echo number_format($total); ?> บาท</span>
                      </div>
                    </div>
                  </div>
                  <input class="w-button" id="print_report_buying" name="print_report_buying" type="submit" value="ปริ้น">
                </div>
              </div>
            </div>

            <div class="w-clearfix content-block">
              <h1 id="management-members">จัดการ User</h1>

              <div>
                <h4>มีสมาชิก <? echo $member_count; ?> คน</h4>
              </div>
              <div class="w-form">
                <form action="index.php#management-members" method="POST" id="manage-user" name="manage-user" data-name="Manage User Form">
                  <div class="w-embed">
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                          <th>ชื่อจริง</th>
                          <th>ชื่อเล่น</th>
                          <th>เบอร์โทร</th>
                          <th>Username</th>
                          <th>ผู้ดูแลระบบ</th>
                          <th>ลบ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while ($row = $db->fetchNextObject($members)) { ?>
                          <tr>
                            <td><? echo $row->fullname; ?></td>
                            <td><? echo $row->nickname; ?></td>
                            <td><? echo $row->phone; ?></td>
                            <td><? echo $row->username; ?></td>
                            <td><input type="checkbox" name="permission[]" value="<? echo $row->user_id; ?>"></td>
                            <td><input type="checkbox" name="del_member[]" value="<? echo $row->user_id; ?>"></td>
                          </tr>
                        <? } ?>
                      </tbody>
                    </table>
                  </div>
                  <input class="w-button btn-confirm-cash" id="sub_manage_user" name="sub_manage_user" type="submit" value="บันทึก" data-wait="Please wait...">
                </form>
              </div>
            </div>
        <?php
          }
        ?>
      <div class="footer-section">
        <div class="italic-text footer">Some footer text can go here.&nbsp;Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <script type="text/javascript" src="js/print.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>