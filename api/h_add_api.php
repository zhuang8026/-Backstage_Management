<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('../checkSession.php');
require_once('../db.inc.php');

$sql = "INSERT INTO `orders` 
        (`username`, `paymentTypeName` , `orderRemark` ) 
        VALUES (?,?,?)";

    $arr = [
        $_POST['username'],
        $_POST['paymentTypeName'],
        $_POST['orderRemark'],
    ];
    
    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arr);
 if ($pdo_stmt->rowCount() === 1) {
     header("Refresh: 1; url=../page/hong/h_orders_index.php");
     echo "新增成功";
 } else {
     header("Refresh: 1; url=../page/hong/h_orders_index.php");
     echo "新增失敗";
 }
