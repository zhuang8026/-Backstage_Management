<?php
header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
require_once('../checkSession.php');

//引用資料庫連線
require_once('../db.inc.php');

echo "<pre>";
print_r($_POST);
echo "<hr>";
print_r($_SESSION);
echo "<hr>";
print_r($_FILES);
echo "<hr>";
//SQL 敘述
$sql = "INSERT INTO `items` 
        (`itemName`, `itemImg`, `colorid`, `itemsbrand`, `itemstype`, `itemPrice`, `itemQty`, `itemscontent`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

if( $_FILES["itemImg"]["error"] === 0 ) {
    echo "11111";
    //為上傳檔案命名
    $studentImg = date("YmdHis");

    //找出副檔名
    $extension = pathinfo($_FILES["itemImg"]["name"], PATHINFO_EXTENSION);  // PATHINFO_EXTENSION 取得路径的附档名 (.jpg / .png)

    //建立完整名稱
    $imgFileName = $studentImg.".".$extension;
    print_r($imgFileName);
    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( move_uploaded_file($_FILES["itemImg"]["tmp_name"], "../asset/file_img/".$imgFileName) ) {
        // header("Refresh: 3; url=./admin.php");
        echo "圖片上傳成功 - {$_FILES['itemImg']['tmp_name']}";
        exit();
    } else {
        // header("Refresh: 3; url=./admin.php");
        echo "圖片上傳失敗 -2";
        exit();
    }
} else {
    $imgFileName = NUll;
}

//繫結用陣列
$arr = [
    $_POST['itemName'],
    $_POST['colorid'],
    $_POST['itemsbrand'],
    $_POST['itemstype'],
    $_POST['itemPrice'],
    $_POST['itemQty'],
    $_POST['itemscontent'],
    $imgFileName
];

echo "<hr>";
echo "<pre>";
print_r($arr);
echo "<hr>";

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    // header("Refresh: 3; url=./admin.php");
    echo "新增成功";
} else {
    // header("Refresh: 3; url=./admin.php");
    echo "新增失敗";
}