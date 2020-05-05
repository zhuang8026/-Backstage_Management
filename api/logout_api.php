<?php
session_start();

//判斷是否需要登出
if(isset($_GET['logout']) && $_GET['logout'] == '1'){
    //關閉 session
    session_destroy();

    //3 秒後跳頁
    header("Refresh: 3; url=../index.php");
    // echo "您已登出…1秒後自動回登入頁";
    echo "<div style='height: 100%; display: flex; justify-content: center; align-items: center;'><img src='../asset/img/logo_login.gif' style='width: 50%;'></div>";
    exit();
}