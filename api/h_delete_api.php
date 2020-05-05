<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

// //SQL 語法
$sql = "DELETE FROM `orders` WHERE `orderId` = ? ";

$arrParam = [
    (int) $_POST['input_delete_id_h']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

// echo $_POST['input_delete_id_h'];

if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=../page/hong/h_orders_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=../page/hong/h_orders_index.php");
    echo "刪除失敗";
}
