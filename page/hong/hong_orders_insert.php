<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('../../checkSession.php');
require_once('../../db.inc.php');

// $sqlOrder = "INSERT INTO `orders` (`username`,`paymentTypeId`) VALUES (?,?)";
$sql = "INSERT INTO `orders` 
        (`username`, `paymentTypeName`) 
        VALUES (?,?)";

    $arr = [
        $_POST['username'],
        $_POST['paymentTypeName'],
    ];
    
    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arr);
 if ($pdo_stmt->rowCount() === 1) {
     header("Refresh: 3; url=./hong_orders_index.php");
     echo "新增成功";
 } else {
     header("Refresh: 3; url=./hong_orders_index.php");
     echo "新增失敗";
 }
