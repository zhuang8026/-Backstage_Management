<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

$sqlGetImg = "SELECT `acImg` FROM `marketing` WHERE `acId` = ?";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$inputDeleteacId = [
    (int)$_POST['input_delete_acid']
];
$stmtGetImg->execute($inputDeleteacId);

if($stmtGetImg->rowCount() > 0) {
    //取得指定 id 的學生資料 (1筆)
    $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC);

    //若是 studentImg 裡面不為空值，代表過去有上傳過
    if($arrImg[0]['acImg'] !== NULL){
        //刪除實體檔案
        @unlink("../asset/file_img/".$arrImg[0]['acImg']);
    }     
}

$sql = "DELETE FROM `marketing` WHERE `acId` = ? ";
$arrParam = [
    (int)$_POST['input_delete_acid']
];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 1; url=../page/activity/ac_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=../page/activity/ac_index.php");
    echo "刪除失敗";
}