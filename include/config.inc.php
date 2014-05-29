<?php
  require_once('./class/db.class.php');
  $db = new DB("lotto", "localhost", "root", "root");

  function secure($string) {
    return mysql_real_escape_string($string);
  }

  function encrypt($string) {
    return md5(md5("p@$$").md5($string));
  }

  function goHome() {
    echo "<script>window.location=\"index.php\";</script>";
  }
?>