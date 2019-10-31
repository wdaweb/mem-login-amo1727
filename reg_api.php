<?php
include_once 'include/_common.php';
/***************************************************
 * 會員註冊行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.建立所需的SQL語法
 * 4.將表單資料以變數形式填入SQL語法中
 * 5.執行資料庫連線並送出SQL語法
 * 6.判斷SQL語法是否執行成功，執行下一步
 ***************************************************/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errmsg = '';
    $acc = fun_testinput($_POST["acc"]);
    $pw = fun_testinput($_POST["pw"]);
    $name = fun_testinput($_POST["name"]);
    $addr = fun_testinput($_POST["addr"]);
    $tel = fun_testinput($_POST["tel"]);
    $email = fun_testinput($_POST["email"]);
    $birthday = fun_testinput($_POST["birthday"]);

    if (empty($acc)) {
        $errmsg .= "【帳號】不可空白！ \\n";
    } else {
        if (strlen($acc) > 20) {
            $errmsg .= "【帳號】不可超過20字！ \\n";
        }
    }
    if (empty($pw)) {
        $errmsg .= "【密碼】不可空白！ \\n";
    } else {
        if (strlen($pw) > 20) {
            $errmsg .= "【密碼】不可超過20字！ \\n";
        }
    }
    if (empty($name)) {
        $errmsg .= "【姓名】不可空白！ \\n";
    } else {
        if (strlen($name) > 20) {
            $errmsg .= "【姓名】不可超過20字！ \\n";
        }
    }
    if (empty($addr)) {
        $errmsg .= "【地址】不可空白！ \\n";
    } else {
        if (strlen($addr) > 200) {
            $errmsg .= "【地址】不可超過200字！ \\n";
        }
    }
    if (empty($tel)) {
        $errmsg .= "【電話】不可空白！ \\n";
    } else {
        if (strlen($tel) > 20) {
            $errmsg .= "【電話】不可超過20字！ \\n";
        }
    }
    if (empty($email)) {
        $errmsg .= "【E-mail】不可空白！ \\n";
    } else {
        if (strlen($email) > 250) {
            $errmsg .= "【E-mail】不可超過250字！ \\n";
        }
    }
    if (!strtotime($birthday)){
        $errmsg .= "【生日】格式錯誤！ \\n";
    }

    if ($errmsg == '') {
        // echo "ccc";
        // 資料正確，新增入DB
        include "include/_db.php";
        $sql="INSERT INTO user(`pw`, `name`, `email`, `acc`, `birthday`, `addr`, `tel`) VALUES ('$pw', '$name', '$email', '$acc', '$birthday', '$addr', '$tel')";
        if ($conn->exec($sql)) {
            $_SESSION['memberacc'] = $acc;
            // setcookie("memberacc",$acc,time()+120);
            fun_alertmsg ('註冊成功！ \\n','member_center.php');
        } else {
            $errmsg = '註冊失敗，請洽系統管理人員！ \\n';
        }
        $conn = null;
    } 
    if ($errmsg != '') {
        fun_alertmsg ($errmsg,'reg.php');
    }  
}
?>