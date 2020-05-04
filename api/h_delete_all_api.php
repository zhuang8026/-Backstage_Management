<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

//SQL 語法
$sql = "DELETE FROM `orders` WHERE `orderId` = ? ";

$count = 0;

$str_sec_2 = explode(",", $_POST['h_input_delete_all_id'][0]);

    $arrParam = [
        $str_sec_2[$i]
    ];
   

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    $count += $stmt->rowCount();


if($count > 0) {
    header("Refresh: 3; url=../page/hong/h_orders_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 3000; url=../page/hong/h_orders_index.php");
    echo "刪除失敗";
}

