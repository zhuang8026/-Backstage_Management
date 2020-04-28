<?php
require_once('../../db.inc.php');

//先取得訂單編號
$sqlOrder = "INSERT INTO `orders` (`username`,`paymentTypeId`) VALUES (?,?)";
$stmtOrder = $pdo->prepare($sqlOrder);
$arrParamOrder = [
    $_POST["username"],
    $_POST["paymentTypeId"]
];
$stmtOrder->execute($arrParamOrder);
$orderId = $pdo->lastInsertId();

$count = 0;


//新增購物車中的每一個項目
$sqlItemList = "INSERT INTO `item_lists` (`dssn`,`pssn`,`checkPrice`,`checkQty`,`checkSubtotal`) VALUES (?,?,?,?,?)";
$stmtItemList = $pdo->prepare($sqlItemList);
for ($i = 0; $i < count($_POST["pssn"]); $i++) {
    $arrParamItemList = [
        $orderId,
        $_POST["pssn"][$i],
        $_POST["checkPrice"][$i],
        $_POST["checkQty"][$i],
        $_POST["checkSubtotal"][$i]
    ];
    $stmtItemList->execute($arrParamItemList);
    $count += $stmtItemList->rowCount();
}

if ($count > 0) {
    // header("Refresh: 3; url=./orders.php");

    //帳號完成後，注銷購物車資訊
    // unset($_SESSION["cart"]);

    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "訂單新增成功";
    echo json_encode($objResponse);
    // echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    // header("Refresh: 3; url=./orders.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 400;
    $objResponse['info'] = "訂單新增失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}
