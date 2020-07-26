<?php
//引入判斷是否登入機制
require_once('../checkSession.php');

//引用資料庫連線
require_once('../db.inc.php');

// echo "<pre>";
// print_r($_FILES);
// print_r($_POST);
// echo "</pre>";
// exit();

// 先對其它欄位，進行 SQL 語法字串連接
$sql = "UPDATE `items`
        LEFT JOIN `multiple_images`
        on `items`.`itemId` = `multiple_images`.`itemId`
        SET
        `itemName` = ?,
        `colorid` = ?,
        `itemsNumber` = ?,
        `itemstype` = ?";

// 先對其它欄位進行資料繫結設定
$arrParam = [
    $_POST['itemName_d'],
    // $_FILES['itemImg_more']['name'],
    $_POST['colorid'],
    $_POST['itemsNumber_d'],
    $_POST['itemstype_d']
];

// echo "<pre>";
// print_r($arrParam);
// echo "</pre>";
// exit();

//判斷檔案上傳是否正常，error = 0 為正常
if( $_FILES["itemImg_d"]["error"] === 0 ) {
    //為上傳檔案命名
    $strDatetime = date("YmdHis");
        
    //找出图片名称 & 副檔名 （皮卡丘.gif）
    $extension = pathinfo($_FILES["itemImg_d"]["name"], PATHINFO_BASENAME); // PATHINFO_EXTENSION 只有附档名 (.jpg)
                                                                             // PATHINFO_BASENAME  全部 (apple.jpg)
    // ******
    // echo "William 测试：";
    // print_r($extension);
    // exit();

    //建立完整名稱
    $studentImg = $strDatetime."_".$extension;

    // ******
    // echo "William 测试：";
    // print_r($studentImg);
    // exit();

    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if( move_uploaded_file($_FILES["itemImg_d"]["tmp_name"], "../asset/file_img/".$studentImg) ) {

        $sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        //加入繫結陣列
        $arrGetImgParam = [
            (int)$_POST['itemId_input']
        ];

        // echo "itemId_input 测试：";
        // print_r($arrGetImgParam);
        // exit();

        //執行 SQL 語法
        $stmtGetImg->execute($arrGetImgParam);

        // print_r($stmtGetImg->rowCount()); //查询笔数
        // exit();

        //若有找到 studentImg 的資料
        if($stmtGetImg->rowCount() > 0) {
            //取得指定 id 的資料 (1筆)
            $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];
            //若是 studentImg 裡面不為空值，代表過去有上傳過
            if($arrImg['itemImg'] !== NULL){
                // 刪除實體檔案
                // "@" 不管此栏位是不是 NULL,删除就对了!
                @unlink("../asset/file_img/".$arrImg['itemImg']);
            } 

            $sql.= ",";
            $sql.= " `itemImg` = ? ";

            //僅對 studentImg 進行資料繫結
            $arrParam[] = $studentImg;
        }
    }
}


// 多圖上傳
$count = 0;
                
$sqlDelete = "DELETE FROM `multiple_images` WHERE `itemId` = ?";
//繫結用陣列
$arrDelParam = [
    (int)$_POST['itemId_input']
];
$stmt = $pdo->prepare($sqlDelete);
$stmt->execute($arrDelParam);

// echo "<pre>";
// print_r($arrDelParam);
// echo "<hr>";
// print_r($arrParam);
// echo "<hr>";
// print_r($_FILES);
// exit(); 

for($i = 0; $i < count($_FILES["itemImg_more"]["name"]); $i++){

    //判斷上傳是否成功 (error === 0)
    if( $_FILES["itemImg_more"]["error"][$i] === 0 ) {

        //為上傳檔案命名
        $strDatetime = "multiple_images_".date("YmdHis")."_".$i;            
        //找出副檔名
        $extension = pathinfo($_FILES["itemImg_more"]["name"][$i], PATHINFO_EXTENSION);
        //建立完整名稱
        $multipleImageImg = $strDatetime.".".$extension;

        // echo "<pre>";
        // print_r($_FILES["itemImg_more"]);
        // echo "<pre>";
        // print_r($_FILES["itemImg_more"]["tmp_name"][$i]);
        // echo "<pre>";
        // print_r($multipleImageImg);
        // exit(); 

        //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
        if( !move_uploaded_file($_FILES["itemImg_more"]["tmp_name"][$i], "../asset/detail_img/{$multipleImageImg}") ) { 
            // header("Refresh: 1; url=./multipleImages.php?itemId={$_POST["itemId"]}");
            $objResponse['success'] = false;
            $objResponse['code'] = 500;
            $objResponse['info'] = "上傳圖片失敗";
            echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
            exit();
        }

        //SQL 敘述
        $sqlDetail = "INSERT INTO `multiple_images` (`multipleImageImg`,`itemId`) VALUES (?, ?)";
        //繫結用陣列
        $arrDetailParam = [
            $multipleImageImg,
            (int)$_POST['itemId_input']
        ];
        $stmtGetDail = $pdo->prepare($sqlDetail);
        $count += $stmtGetDail->execute($arrDetailParam);

        // echo "<pre>";
        // print_r($arrDetailParam);
        // echo "<hr>";
        // print_r($count);
        // exit(); 

        //若有找到 multipleImageImg 的資料
        // if( $count > 0) {
        //     //若是 multipleImageImg 裡面不為空值，代表過去有上傳過
        //     if($arrDetailParam[0] !== NULL){
        //         // 刪除實體檔案
        //         // "@" 不管此栏位是不是 NULL,删除就对了!
        //         @unlink("../asset/detail_img/".$arrDetailParam[0]);
        //     }
        //     //僅對 multipleImageImg 進行資料繫結
        //     $arrParam[4][] = $multipleImageImg;         
        // }  
    }  
} 

// echo "<pre>";
// print_r($arrParam);
// echo "<hr>";
// print_r($count);
// exit(); 


//SQL 結尾
$sql.= " WHERE `items`.`itemId` = ? ";
$arrParam[] = (int)$_POST['itemId_input'];

// echo "<pre>";
// print_r($_POST['itemId_input']);
// echo "<hr>";
// print_r($arrParam);
// echo "<hr>";
// print_r($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

// echo "<pre>";
// print_r($_POST['itemId_input']);
// echo "<hr>";
// print_r($arrParam);
// echo "<hr>";
// print_r($stmt);
// echo "<hr>";
// print_r($stmt->rowCount());
// exit();


if( $stmt->rowCount() > 0 || $count > 0){
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "更新成功";
} else {
    header("Refresh: 1; url=../page/wi/wi_items_index.php");
    echo "沒有任何更新";
}