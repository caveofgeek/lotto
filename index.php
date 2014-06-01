<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue May 27 2014 17:06:05 GMT+0000 (UTC) -->
<html data-wf-site="5384ab401fae7daf76e9d624">
<head>
  <meta charset="utf-8">
  <title>Lotto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="https://y7v4p6k4.ssl.hwcdn.net/placeholder/favicon.ico">
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
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="buy-lotto" name="buy-lotto" data-name="Lotto Buying Form">
                        <label for="name">งวดที่ซื้อ</label>
                        <select class="w-select small-size" id="date_lotto" name="date_lotto">
                            <option value="01/05/2014">01/05/2014</option>
                            <option value="01/05/2014">16/05/2014</option>
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
                        <input class="w-button" id="sub_add_lotto" name="sub_add_lotto" type="submit" value="Submit" data-wait="Please wait..." disabled>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-lotto">
                    <h4>ตัวเลขที่ซื้อทั้งหมด xx&nbsp;&nbsp;ตัว</h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td colspan="4">รวมทั้งสิ้น ​</td>
                            <td>14</td>
                            <td>14,000,000.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="w-embed btn-confirm">
                      <button>ยืนยันการสั่งซื้อ</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="member-report">รายงานการซื้อของ User xxxx</h1>
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="report-user" name="report-user" data-name="report-user">
                        <label for="radio">ค้นหาจากงวดที่</label>
                        <select class="w-select small-size" id="find_date" name="find_date">
                          <option value="01/05/2014">01/05/2014</option>
                          <option value="16/05/2014">16/05/2014</option>
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
                        <input class="w-button" id="sub_user_report" name="sub_user_report" type="submit" value="Submit" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-lotto">
                    <h4 class="w-embed">ตัวเลขที่ซื้อทั้งหมด xx&nbsp;&nbsp;ตัว</h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td colspan="4">รวมทั้งสิ้น ​</td>
                            <td>14</td>
                            <td>14,000,000.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="check-payment">ตรวจสอบการชำระเงิน</h1>
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="check-payment-form" name="check-payment-form" data-name="Check Payment Form">
                        <label for="radio">ค้นหาจากงวดที่</label>
                        <select class="w-select small-size" id="find_date" name="find_date">
                          <option value="01/05/2014">01/05/2014</option>
                          <option value="16/05/2014">16/05/2014</option>
                        </select>
                        <label for="2char3">ประเภทหวยที่ซื้อ&nbsp;&nbsp;( 2 หรือ 3 ตัว )</label>
                        <div class="w-clearfix">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="2char3" type="radio" name="char" value="2" data-name="2char3">
                            <label class="w-form-label" for="2char3">2 ตัว</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="3char3" type="radio" name="char" value="3" data-name="3char3">
                            <label class="w-form-label" for="3char3">3 ตัว</label>
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
                        <label class="type-for-3char3" for="radio">ประเภทสำหรับการซื้อ เฉพาะ 3 ตัวเท่านั้น</label>
                        <div class="w-clearfix type-for-3char3">
                          <div class="w-radio radio-up">
                            <input class="w-radio-input" id="teng" type="radio" name="typepay" value="teng" data-name="teng" checked="true">
                            <label class="w-form-label" for="radio">เต้ง</label>
                          </div>
                          <div class="w-radio radio-down">
                            <input class="w-radio-input" id="tod" type="radio" name="typepay" value="tod" data-name="tod">
                            <label class="w-form-label" for="radio">โต๊ด</label>
                          </div>
                        </div>
                        <input class="w-button" id="search_lotto_payment" name="search_lotto_payment" type="submit" value="Submit" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-lotto">
                    <h4>ตัวเลขที่ซื้อทั้งหมด xx&nbsp;&nbsp;ตัว</h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                            <th>สถานะการชำระ</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td>ชำระเรียบร้อย</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td>ชำระเรียบร้อย</td>
                          </tr>
                        </tbody>
                      </table>
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
              <h1 id="admin-report-buying">รายงานสรุปการซื้อหวย (ADMIN)</h1>
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div class="w-row">
                <div class="w-col w-col-3">
                  <div class="form">
                    <div class="w-form">
                      <form id="result-buying" name="result-buying" data-name="Result Form">
                        <label for="radio">ค้นหาจากงวดที่</label>
                        <select class="w-select small-size" id="find_date" name="find_date">
                          <option value="01/05/2014">01/05/2014</option>
                          <option value="16/05/2014">16/05/2014</option>
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
                        <input class="w-button" id="search-lotto" type="submit" value="Submit" data-wait="Please wait...">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="w-col w-col-9">
                  <div class="detail-lotto">
                    <h4>ตัวเลขที่ซื้อทั้งหมด xx&nbsp;&nbsp;ตัว</h4>
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>งวดที่</th>
                            <th>ประเภท</th>
                            <th>ตำแหน่ง</th>
                            <th>ประเภทที่ซื้อ</th>
                            <th>เลขที่ซื้อ</th>
                            <th>ราคา ( บาท )</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                          </tr>
                          <tr>
                            <td colspan="4">รวมทั้งสิ้น ​</td>
                            <td>14</td>
                            <td>14,000,000.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="management-payment">จัดการการชำระเงิน</h1>
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div>
                <h4>รายการที่ยังไม่ได้ชำระเงิน</h4>
                <div class="w-form">
                  <form id="manage-payment" name="manage-payment" data-name="Manage Payment Form">
                    <div class="w-embed">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
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
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td align="center">
                              <input type="checkbox">
                            </td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td align="center">
                              <input type="checkbox">
                            </td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td align="center">
                              <input type="checkbox">
                            </td>
                          </tr>
                          <tr>
                            <td>28 พฤษภาคม 2556</td>
                            <td>2 ตัว</td>
                            <td>บน</td>
                            <td>-</td>
                            <td>123</td>
                            <td>1,000,000.00</td>
                            <td align="center">
                              <input type="checkbox">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <input class="w-button btn-confirm-cash" id="sub_manage_payment" name="sub_manage_payment" type="submit" value="Submit" data-wait="Please wait...">
                  </form>
                </div>
              </div>
            </div>
            <div class="w-clearfix content-block">
              <h1 id="management-members">จัดการ User</h1>
              <p>คำอธิบาย
                <br>Section description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus
                nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
              <div>
                <h4>มีสมาชิก xx คน</h4>
              </div>
              <div class="w-form">
                <form id="manage-user" name="manage-user" data-name="Manage User Form">
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
                        <tr>
                          <td>นาย สมร สมทรง</td>
                          <td>บอส</td>
                          <td>090-112-3134</td>
                          <td>aaaaa</td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                        </tr>
                        <tr>
                          <td>นาย สมร สมทรง</td>
                          <td>บอส</td>
                          <td>090-112-3134</td>
                          <td>aaaaa</td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                        </tr>
                        <tr>
                          <td>นาย สมร สมทรง</td>
                          <td>บอส</td>
                          <td>090-112-3134</td>
                          <td>aaaaa</td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                        </tr>
                        <tr>
                          <td>นาย สมร สมทรง</td>
                          <td>บอส</td>
                          <td>090-112-3134</td>
                          <td>aaaaa</td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                          <td align="center">
                            <input type="checkbox">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <input class="w-button btn-confirm-cash" id="sub_manage_user" name="sub_manage_user" type="submit" value="Submit" data-wait="Please wait...">
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
  <script type="text/javascript" src="js/index.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>