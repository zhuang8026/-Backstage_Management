<?php

require_once('../../db.inc.php');

// //SQL 語法
$sql = "DELETE FROM `store`
WHERE `storeId` = ? ";

$arrParam = [
    (int) $_POST['input_delete_id_f']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);


if ($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./shopper.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=./shopper.php");
    echo "刪除失敗";
}
