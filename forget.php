<?php
include_once 'include/_common.php';

$showPW = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $email = fun_testinput($_POST["email"]);
  if (empty($email)) {
      fun_alertmsg ('【E-mail】不可空白！','forget.php');
  } else {
    include "include/_db.php";
    $sql="select pw from user where email = '". $email ."'";
    $data=$conn->query($sql)->fetch();
    if (!empty($data)) {
      $showPW = $data["pw"];
    } else {
      fun_alertmsg ('無此E-mail，請重新填寫！','forget.php');
    }
    $conn = null;
  }
}
if ($showPW != '') {
  $showPW = '<tr><td>你的密碼：<span style="font-color:red;font-size:20px;">'. $showPW .'</span></td></tr>';
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>尋回密碼</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<h1>找回密碼</h1>
<form action="forget.php" method="post">
<table class="wrapper">
<!---------設計表單內容---------->
  <tr>
    <td>E-mail：<input type="text" name="email" id="email"><input type="submit" value="送出"></td>
  </tr>
  <?php echo $showPW ?>
  <tr>
    <td class="ct reg">
      <a href="index.php">回首頁</a>
    </td>
  </tr>
</table>
</form>
</body>
</html>
