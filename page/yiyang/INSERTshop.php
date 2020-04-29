<?php
    header("Content-Type: text/html; chartset=utf-8");
    require_once('../../db.inc.php');
    $sql = "INSERT INTO `store`
            (`sellerId`,`storeName`,`storeImg`,`storePhone`,`storeEmail`,`storeDescription`,`storeAddress`)
            VALUES (?,?,?,?,?,?,?)";
    if( $_FILES["storeImg"]["error"] === 0 ) {
        //為上傳檔案命名
        $store_img = date("YmdHis");
        
        //找出副檔名
        $extension = pathinfo($_FILES["storeImg"]["name"], PATHINFO_EXTENSION);

        //建立完整名稱
        $imgFileName = $store_img.".".$extension;

        //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
        if( !move_uploaded_file($_FILES["storeImg"]["tmp_name"], "./images/".$imgFileName) ) {
            header("Refresh: 100000; url=./shopper.php");
            echo "圖片上傳失敗";
            exit();
        }
    }

    $arr = [
        $_POST['sellerId'],
        $_POST['storeName'],
        $imgFileName,
        $_POST['storePhone'],
        $_POST['storeEmail'],
        $_POST['storeDescription'],
        $_POST['storeAddress'],
    ];
    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arr);
    if($pdo_stmt->rowCount() === 1) {
        header("Refresh: 0; url=./shopper.php");
    } else {
        header("Refresh: 100; url=./shopper.php");
    }