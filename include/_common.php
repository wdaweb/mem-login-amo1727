<?php 
    session_start();
    function fun_testinput($datatestinput) {
        $datatestinput = trim($datatestinput);
        $datatestinput = stripslashes($datatestinput);  
        $datatestinput = htmlspecialchars($datatestinput);
        return $datatestinput;
    }
    function fun_alertmsg ($msg,$link){
        $alertmsg = "<script>\n";
        $alertmsg .= "alert('". $msg ."');\n";
        $alertmsg .= "location.href='".$link."';\n";
        $alertmsg .= "</script>\n";
        echo $alertmsg;
    }
?>