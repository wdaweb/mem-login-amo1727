<?php
include_once 'include/_common.php';
/***************************************************
 * 會員登入行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.從資料庫取得資料
 * 4.比對表單資料和資料庫資料是否一致
 * 5.根據比對的結果決定畫面的行為
  ***************************************************/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $acc = fun_testinput($_POST["acc"]);
  $pw = fun_testinput($_POST["pw"]);

  if (empty($acc) || empty($pw)) {
      fun_alertmsg ('【帳號】【密碼】不可空白！ \n','index.php');
  } else {
    include "include/_db.php";
    //法1
    $sql="select acc from user where acc = '". $acc ."' and pw = '" . $pw ."'";
    $data=$conn->query($sql)->fetch();
    if (!empty($data)) {
      $_SESSION['memberacc'] = $data['acc'];
      // setcookie("memberacc",$data['acc'],time()+120);
      fun_alertmsg ('登入成功！ \n','member_center.php');
    } else {
      fun_alertmsg ('登入失敗，請重新填寫帳密！ \n','index.php');
    }
    $conn = null;
  }
}
?>




?>