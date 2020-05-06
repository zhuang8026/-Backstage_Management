<?php
require_once('../../checkSession.php');
require_once('../../db.inc.php');

$sqlGetImg = "SELECT `userlogo` FROM `users` WHERE `id` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$arrGetImgParam = [
    (int)$_POST['input_delete_member']
];
$stmtGetImg->execute($arrGetImgParam);

if($stmtGetImg->rowCount() > 0) {
    //取得指定 id 的學生資料 (1筆)
    $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC);

    //若是 studentImg 裡面不為空值，代表過去有上傳過
    if($arrImg[0]['userlogo'] !== NULL){
        //刪除實體檔案
        @unlink("./files/".$arrImg[0]['userlogo']);
    }     
}

$sql = "DELETE FROM `users` WHERE `id` = ? ";
$arrParam = [
    (int)$_POST['input_delete_member']
];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 1; url=./k_member_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=./k_member_index.php");
    echo "刪除失敗";
}