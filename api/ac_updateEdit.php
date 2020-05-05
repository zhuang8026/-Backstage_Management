<?php
//引入判斷是否登入機制
require_once('../checkSession.php');

//引用資料庫連線
require_once('../db.inc.php');

$sql = "UPDATE `marketing`
        SET 
        `marketing`.`acName` = ?,
        `marketing`.`acDescription` = ?";

$arrParam = [
    $_POST['acName_e'],
    $_POST['acDescription_e']
];

// echo "<pre>";
// print_r( $arrParam );
// exit();

if( $_FILES["acImg_e"]["error"] === 0 ){
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["acImg_e"]["name"], PATHINFO_EXTENSION);
    $studentImg = $strDatetime.".".$extension;
    if( move_uploaded_file($_FILES["acImg_e"]["tmp_name"], "../asset/file_img/".$studentImg) ){
        $sqlGetImg = "SELECT `acImg` FROM `marketing` WHERE `acId` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);
        $arrGetImgParam = [
            (int)$_POST['acId_input']
        ];
        $stmtGetImg->execute($arrGetImgParam);
        if($stmtGetImg->rowCount() > 0){
            $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];
            if( $arrImg["acImg"] !== NULL){
                @unlink("../asset/file_img/".$arrImg["acImg"]);
            }

            $sql.= ",";
            $sql.= " `acImg` = ? ";
            $arrParam[] = $studentImg;
        }
    }
} else {
    $sql.= ",";
    $sql.= " `acImg` = ? ";
    $studentImg = "NULL";
    $arrParam[] = $studentImg;
}

$sql.= " WHERE `marketing`.`acId` = ? ";
$arrParam[] = (int)$_POST['acId_input'];

// echo "<pre>";
// print_r($sql);
// exit();

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);


// echo "<pre>";
// print_r($arrParam);
// echo "<hr>";
// print_r($stmt->rowCount());
// exit();




if( $stmt->rowCount() > 0 ){//彈回編輯頁
    header('refresh: 1; url=../page/activity/ac_index.php');
    echo "更新成功";
} else {//彈回編輯頁
    header("Refresh: 1; url=../page/activity/ac_index.php");
    echo "沒有任何更新";
}