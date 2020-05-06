<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('../checkSession.php');
require_once('../db.inc.php');

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();

//回傳狀態
$objResponse = [];

if( $_FILES["storeImg"]["error"] === 0 ) {
    //為上傳檔案命名
    $strDatetime = "item_".date("YmdHis");
        
    //找出副檔名
    $extension = pathinfo($_FILES["storeImg"]["name"], PATHINFO_EXTENSION);

    //建立完整名稱
    $storeImg = $strDatetime.".".$extension;

    //若上傳失敗，則回報錯誤訊息
    if( move_uploaded_file($_FILES["storeImg"]["tmp_name"], "../asset/file_img/{$storeImg}") ) {
        // echo "<hr>";
        // echo "<pre>";
        // print_r($_FILES);
    } else {
        $objResponse['success'] = false;
        $objResponse['code'] = 500;
        $objResponse['info'] = "上傳圖片失敗";
        echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
        exit();
    }
} else {
    $storeImg = "";
}

// SQL 敘述
// storeItemsId 是 賣場商品編號，讓他等於 storeId ,這樣在items 也可以取得 產品與賣場對應的id
$sql = "INSERT INTO `stores` (`storeName`, `storeLogo`, `storeDescription`,`storeItemsId`)
        VALUES (?, ?, ?, ?)";
//繫結用陣列
$arrParam = [
    $_POST['storeName'],
    $storeImg,
    $_POST['storeDescription'],
    $_POST['sellersId']
];

// echo "<pre>";   
// print_r($arrParam);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

// echo "<pre>";   
// print_r($stmt->rowCount());
// exit();

if($stmt->rowCount() > 0) {
    header("Refresh: 1; url=../page/yy/yy_items_index.php");
    $objResponse['success'] = true;
    $objResponse['code'] = 200;
    $objResponse['info'] = "新增成功";
    echo "新增成功";
    // echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
} else {
    header("Refresh: 3; url=../page/yy/yy_items_index.php");
    $objResponse['success'] = false;
    $objResponse['code'] = 500;
    $objResponse['info'] = "沒有新增資料";
    echo "沒有新增資料";
    // echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}