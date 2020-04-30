<?php
require_once('../checkSession.php');
require_once('../db.inc.php');

//SQL 語法
// $sql = "DELETE FROM `items` WHERE `itemId` IN ? ";
$sql = "DELETE FROM `items` WHERE `itemId` = ? ";

$count = 0;

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
// $sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` IN ? ";
$sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

// print_r(count($_POST['input_delete_all_id']));
// print_r($_POST['input_delete_all_id']);
// echo "<pre>";
$str_sec_2 = explode(",", $_POST['input_delete_all_id'][0]);
// print_r($str_sec_2);
// exit();

// print_r(count($str_sec_2));
// exit();

for($i = 0; $i < count($str_sec_2); $i++){
    //加入繫結陣列
    $arrParam = [
        $str_sec_2[$i]
    ];
    echo "<pre>";
    print_r($arrParam);
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
        if($arrImg[0]['itemImg'] !== NULL){
            //刪除實體檔案
            @unlink("../asset/file_img/".$arrImg[0]['itemImg']);
        }     
    }

    $arrParamtable = [
        $str_sec_2[$i]
    ];
    // $str_sec_2 = explode(",", $arrParamtable[0]);

    // echo "<pre>";
    // print_r($str_sec_2);
    // exit();

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParamtable);
    $count += $stmt->rowCount();
}

// echo $count;
// exit();
if($count > 0) {
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "刪除失敗";
}

