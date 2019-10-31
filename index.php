<?php 
include_once 'include/_common.php';
if (!empty($_GET['logout'])) {
  if ($_GET['logout'] == '1') {
    unset($_SESSION['memberacc']);
    // setcookie("memberacc","",time()-3600);
    fun_alertmsg ("已登出會員中心!!","index.php");
  } 
}
if (!empty($_SESSION["memberacc"])) {
// if (!empty($_COOKIE["memberacc"])) {
  header("location: member_center.php");
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>註冊登入系統</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <h1>會員登入</h1>
<form action="login_api.php" method="post"> 
<table class="wrapper">
  <tr>
    <td>帳號：</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td>密碼：</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td colspan="2" class="ct">
        <input type="submit" value="登入">
        <input type="reset" value="重置">
    </td>
  </tr>
  <tr>
    <td colspan="2" class="ct">
      <a href="reg.php" class="reg">註冊會員</a> 
      <a href="forget.php" class="reg">忘記密碼</a>
    </td>
  </tr>
</table>
</form>   
</body>
</html>
