<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

// 先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `orders` 
        SET 
        `paymentTypeId` = ?,
        `payment` = ?,
        `delivery` = ?,
        `orderRemark` = ?";

// 先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['paymentTypeId_h'],
    $_POST['payment_h'],
    $_POST['delivery_h'],
    $_POST['orderRemark_h'],
];


//SQL 結尾
$sql .= " WHERE `orderId` = ? ";
$arrParam[] = (int) $_POST['order_input'];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=../page/hong/h_orders_index.php");
    echo "更新成功";
} else {
    header("Refresh: 1; url=../page/hong/h_orders_index.php");
    echo "沒有任何更新";
}
