<?php
//引入判斷是否登入機制
require_once('../checkSession.php');

//引用資料庫連線
require_once('../db.inc.php');

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
// exit();

// 先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `items` 
        SET 
        `itemName` = ? ";

// 先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['itemName_d']
];

// echo "<pre>";
// print_r($arrParam);

//SQL 結尾
$sql.= "WHERE `itemId` = ? ";
$arrParam[] = (int)$_POST['itemId_input'];

// echo "<pre>";
// print_r($_POST['itemId_input']);
// print_r($arrParam);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if( $stmt->rowCount() > 0 ){
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "更新成功";
} else {
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "沒有任何更新";
}