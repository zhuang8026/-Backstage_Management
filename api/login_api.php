<?php
session_start();
header("Content-Type: text/html; chartset=utf-8");
require_once('../db.inc.php');

// ------ Google 驗證 ------ start
// grab recaptcha library
require_once('../recaptchalib.php');

// your secret key
$secret = "6LdxNfcUAAAAAExckVYVHcmqrIw3XI_oMv6dQMxK";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
} else {
    echo "請進行人機身分驗證，謝謝";
    exit();
}

// ------ Google 驗證 ------ end


// echo "<pre>";
// print_r($_POST);
// print_r($_SERVER);
// echo "<hr>";
// exit(); // 检查密码使用

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    switch($_POST['identity']){
        case 'manager': // manager
            $sql = "SELECT `managername`, `pwd`, `name`
                    FROM `manager` 
                    WHERE `managername` = ? 
                    AND `pwd` = ? ";
        break;

        case 'admin': // seller
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `users` 
                    WHERE `username` = ? 
                    AND `pwd` = ? 
                    AND `isActivated` = 1";
        break;

        case 'user': // buyer
            $sql = "SELECT `username`, `pwd`, `name`
                    FROM `users`
                    WHERE `username` = ? 
                    AND `pwd` = ? 
                    AND `isActivated` = 0";
        break;
    }
    $arrParam = [
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    // echo"<pre>";
    // print_r($arrParam);
    // echo "<hr>";
    // print_r($sql);
    // echo "<hr>";

    $pdo_stmt = $pdo->prepare($sql);   
    $pdo_stmt->execute($arrParam);     

    // echo"<pre>";
    // print_r($pdo_stmt);

    if( $pdo_stmt->rowCount() > 0 ){   
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['pwd'];
        header("Refresh: 3; url=../page/wi/wi_items_index.php");
        // echo "<img src='../asset/img/logo_login.gif'><h1>welcome ! \"{$_POST['identity']}\". {$_SESSION['username']} </h1>";
        echo "<div style='height: 100%; display: flex; justify-content: center; align-items: center;'><img src='../asset/img/logo_login.gif' style='width: 50%;'></div>";
    } else {
        header("Refresh: 1; url=../index.php");
        echo "<img src='../asset/img/fail.gif'><span>Login failed. Wait a moment 3s ...</span>";
    }
} else {
    header("Refresh: 1; url=../index.php");
    echo "<img src='../asset/img/fail.gif'><span>Login failed. Wait a moment 3s ...</span>";
}