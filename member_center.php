<?php
include_once 'include/_common.php';
$member_id = '';
$member_pw = '';
$member_name = '';
$member_email = '';
$member_acc = '';
$member_birthday = '';
$member_addr = '';
$member_tel = '';
if (!empty($_SESSION["memberacc"])) {
// if (!empty($_COOKIE["memberacc"])) {
	include "include/_db.php";
  $sql="SELECT * FROM `user` where acc = '". $_SESSION["memberacc"] ."'";
  // $sql="SELECT * FROM `user` where acc = '". $_COOKIE["memberacc"] ."'";
  $data = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  if (!empty($data)) {
		$member_id = $data["id"];
    $member_pw = $data["pw"];
    $member_name = $data["name"];
    $member_email = $data["email"];
    $member_acc = $data["acc"];
    $member_birthday = $data["birthday"];
    $member_addr = $data["addr"];
    $member_tel = $data["tel"];
	}else{
    fun_alertmsg ('無此帳號，請重新登入!!['. $sql .']','index.php');
  }
	$conn = null;
}else{
  fun_alertmsg ('尚未登入或閒置時間過長，請重新登入!!','index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>會員中心</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <div class="member">
    <div style="float:right;">
    [<a href="index.php?logout=1">登出</a>]
    </div>  
    <div class="wellcome">
      HI! 歡迎光臨!以下是你的個人資料:
    </div>
    <div class="private">
      <!--請自行設計個人資料的呈現方式並從資料庫取得會員資料-->
      <table class="wrapper">
        <tr>
          <td>帳號：</td>
          <td><?php echo $member_acc?></td>
        </tr>
        <tr>
          <td>密碼：</td>
          <td><?php echo $member_pw?></td>
        </tr>
        <tr>
          <td>姓名：</td>
          <td><?php echo $member_name?></td>
        </tr>
        <tr>
          <td>地址：</td>
          <td><?php echo $member_addr?></td>
        </tr>
        <tr>
          <td>電話：</td>
          <td><?php echo $member_tel?></td>
        </tr>
        <tr>
          <td>E-mail：</td>
          <td><?php echo $member_email?></td>
        </tr>
        <tr>
          <td>生日：</td>
          <td><?php echo $member_birthday?></td>
        </tr>
      </table>



    </div>
  </div>
</body>
</html>