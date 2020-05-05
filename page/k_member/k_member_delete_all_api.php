<?php
//引入判斷是否登入機制
require_once('../../checkSession.php');

//引用資料庫連線
require_once('../../db.inc.php');

//SQL 語法
$sql = "DELETE FROM `users` WHERE `id` = ? ";

$count = 0;

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `userlogo` FROM `users` WHERE `id` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$str_sec_2 = explode(",", $_POST['memberinput_delete_all_id'][0]);
// print_r($str_sec_2);
// exit();

// print_r(count($str_sec_2));
// exit();

for($i = 0; $i < count($str_sec_2); $i++){
    //加入繫結陣列
    $arrParam = [
        $str_sec_2[$i]
    ];

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
        if($arrImg[0]['userlogo'] !== NULL){
            //刪除實體檔案
            @unlink("./files/".$arrImg[0]['userlogo']);
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
    header("Refresh: 0; url=./k_member_index.php");
    echo "刪除成功";
} else {
    header("Refresh: 1; url=./k_member_index.php");
    echo "刪除失敗";
}