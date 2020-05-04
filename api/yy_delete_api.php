<?php
//引入判斷是否登入機制
require_once('../checkSession.php');

//引用資料庫連線
require_once('../db.inc.php');

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `storeLogo` FROM `stores` WHERE `storeId` = ?";
$stmtDeleteImg = $pdo->prepare($sqlGetImg);

//加入繫結陣列
$inputDeleteId = [
    (int)$_POST['yy_input_delete_id'] // 来自 admin.php 的 deleteId="" 刪除
];

//執行 SQL 語法
$stmtDeleteImg->execute($inputDeleteId);

// 检查是否有 栏位
// echo "<pre>";
// print_r($inputDeleteId);
// print_r($stmtDeleteImg->rowCount());
// exit();

//若有找到 studentImg 的資料
if($stmtDeleteImg->rowCount() > 0) {
    //取得指定 id 的學生資料 (1筆)
    $arrImg = $stmtDeleteImg->fetchAll(PDO::FETCH_ASSOC);

    //若是 studentImg 裡面不為空值，代表過去有上傳過
    if($arrImg[0]['storeLogo'] !== NULL){
        //刪除實體檔案
        @unlink("../asset/file_img/".$arrImg[0]['storeLogo']);
    }     
}

$sqlOwnr = "UPDATE `users`
        SET
        `users`.`shopopen` = 0
        WHERE
        `users`.`id` = ?";
$arrOwnr[] = (int)$_POST['yy_input_delete_id'];
$stmtOwnr = $pdo->prepare($sqlOwnr);
$stmtOwnr->execute($arrOwnr);
// print_r($stmtOwnr->rowCount());
// exit();

// //SQL 語法
$sql = "DELETE FROM `stores` WHERE `storeId` = ? ";

$arrParam = [
    (int)$_POST['yy_input_delete_id']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 1; url=../page/yy/yy_items_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=../page/yy/yy_items_index.php");
    echo "刪除失敗";
}