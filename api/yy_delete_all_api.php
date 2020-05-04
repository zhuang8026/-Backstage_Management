<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

//SQL 語法
// $sql = "DELETE FROM `items` WHERE `itemId` IN ? ";
$sql = "DELETE FROM `stores` WHERE `storeId` = ? ";

$count = 0;
//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `storeLogo` FROM `stores` WHERE `storeId` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$str_checkbox_id = explode(",", $_POST['yy_input_delete_all_id'][0]);
$str_username = explode(",", $_POST['yy_input_delete_all_username'][0]);

// echo "<pre>";
// print_r($str_checkbox_id);
// print_r($str_username);
// exit();

for($i = 0; $i < count($str_checkbox_id); $i++){
    //加入繫結陣列
    $arrParam = [
        $str_checkbox_id[$i]
    ];
    // echo "<pre>";
    // print_r($arrParam);
    // exit();
    $stmtGetImg->execute($arrParam);
    // echo "<pre>";
    // print_r($stmtGetImg);
    // echo "<hr>";
    // print_r($stmtGetImg->rowCount());
    // exit();

    //若有找到 studentImg 的資料
    if($stmtGetImg->rowCount() > 0) {
        //取得指定 id 的學生資料 (1筆)
        $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC);

        //若是 studentImg 裡面不為空值，代表過去有上傳過
        if($arrImg[0]['storeLogo'] !== NULL){
            //刪除實體檔案
            @unlink("../asset/file_img/".$arrImg[0]['storeLogo']);
        }     
    }

    // 刪除後，users 的權限需關閉 shopopen = 0
    $sqlOwnr = "UPDATE `users`
        SET
        `users`.`shopopen` = 0
        WHERE
        `users`.`username` = ?";
    $arrOwnr = [
        $str_username[$i]
    ];
    $stmtOwnr = $pdo->prepare($sqlOwnr);
    $stmtOwnr->execute($arrOwnr);
    // echo "<pre>";
    // print_r($arrOwnr);
    // print_r($stmtOwnr->rowCount());
    // exit();

    $arrParamtable = [
        $str_checkbox_id[$i]
    ];

    // echo "<pre>";
    // print_r($arrParamtable);
    // exit();

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParamtable);
    $count += $stmt->rowCount();
}

// print_r($stmtOwnr->rowCount());
// echo $count;
// echo "<hr>";
// exit();

if($count > 0) {
    header("Refresh: 1; url=../page/yy/yy_items_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=../page/yy/yy_items_index.php");
    echo "刪除失敗";
}

