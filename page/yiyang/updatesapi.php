<?php
    header("Content-Type: text/html; chartset=utf-8");
    require_once('../../db.inc.php');
    require_once('../../checkSession.php');
    $sql = "UPDATE `store`
            SET    
                    `storeName` = ?,
                    `storePhone` = ?,
                    `storeEmail` = ?,
                    `storeDescription` = ?,
                    `storeAddress` = ? ";
   
    

    $arrParam = [
       
        $_POST['storeName'],
        $_POST['storePhone'],
        $_POST['storeEmail'],
        $_POST['storeDescription'],
        $_POST['storeAddress'],
    ];

    if( $_FILES["storeImg"]["error"] === 0 ) {
        //為上傳檔案命名
        $strDatetime = date("YmdHis");
            
        //找出副檔名
        $extension = pathinfo($_FILES["storeImg"]["name"], PATHINFO_EXTENSION);
    
        //建立完整名稱
        $imgFileName = $strDatetime.".".$extension;
    
  //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
  if( move_uploaded_file($_FILES["storeImg"]["tmp_name"], "./images/".$imgFileName) ) {



    $sqlGetImg = "SELECT `storeImg` FROM `store` WHERE `storeId` = ? ";
    $stmtGetImg = $pdo->prepare($sqlGetImg);



    //加入繫結陣列
    $arrGetImgParam = [
      $_POST['storeId_input']
    ];

    //執行 SQL 語法
        $stmtGetImg->execute($arrGetImgParam);

        
        //若有找到 studentImg 的資料
        if($stmtGetImg->rowCount() > 0) {
            //取得指定 id 的學生資料 (1筆)
            $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC);

            //若是 studentImg 裡面不為空值，代表過去有上傳過
            if($arrImg[0]['storeImg'] !== NULL){
                //刪除實體檔案
                @unlink("./image/".$arrImg[0]['storeImg']);
            } 
            
            /**
             * 因為前面 `studentDescription` = ? 後面沒有加「,」，
             * 若是這裡會有更新 studentImg 的需要，
             * 代表 `studentDescription` = ? 後面缺一個「,」，
             * 不然會報錯
             */
            $sql.= ",";

            //studentImg SQL 語句字串
            $sql.= "`storeImg` = ? ";

            //僅對 studentImg 進行資料繫結
            $arrParam[] = $imgFileName;
            
        }
    } 

    
}


//SQL 結尾
$sql.= "WHERE `storeId` = ? ";
$arrParam[] = $_POST['storeId_input'];

$stmt = $pdo->prepare($sql);

// if(!$stmt){
//     print_r($pdo->errorInfo());
//     exit();
// }

$stmt->execute($arrParam);

// $previousPage = $_SERVER["HTTP_REFERER"];
if( $stmt->rowCount() > 0 ){
    header("Refresh: 0.1; url=./yi_shop_index.php");
    echo "<script>alert('修改成功')</script>";
    exit();
} else {
    header("Refresh: 3; url=./yi_shop_index.php");
    echo "<script>alert('修改失敗')</script>";
    exit();
}