<?php
session_start();
header("Content-Type: text/html; chartset=utf-8");
require_once('../db.inc.php');

echo "<pre>";
print_r($_POST);
echo "<hr>";
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

    echo"<pre>";
    print_r($arrParam);
    echo "<hr>";
    print_r($sql);
    echo "<hr>";

    $pdo_stmt = $pdo->prepare($sql);   
    $pdo_stmt->execute($arrParam);     

    // echo"<pre>";
    // print_r($pdo_stmt);

    if( $pdo_stmt->rowCount() > 0 ){   
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['pwd'];
        header("Refresh: 3; url=../page/wi/wi_items_index.php");
        echo "<img src='../asset/img/sgin.gif'><span>{$_SESSION['username']} is \"{$_POST['identity']}\". Sign in suceesfully. Wait a moment 3s ...</span>";
    } else {
        // header("Refresh: 3; url=./login.php");
        echo "<img src='../asset/img/fail.gif'><span>Login failed. Wait a moment 3s ...</span>";
    }
} else {
    // header("Refresh: 3; url=./login.php");
    echo "<img src='../asset/img/fail.gif'><span>Login failed. Wait a moment 3s ...</span>";
}