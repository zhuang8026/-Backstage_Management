<?php
//引入判斷是否登入機制
require_once('../../checkSession.php');

//引用資料庫連線
require_once('../../db.inc.php');

$sql = "UPDATE `marketing` 
        SET 
        `acId` = ?,
        `acName` = ?,
        `acDescription` = ?,
        `acImg` = ?,
        `sellerId` = ?,
        `founder` = ?,";

$arrParam = [
    $_POST['acId_e'],
    $_POST['acName_e'],
    $_POST['acDescription_e'],
    $_POST['sellerId_e'],
    $_POST['founder_e'],
];

// echo "<pre>";
// print_r( $arrParam );
// exit();

if( $_FILES["acImg_e"]["error"] === 0 ){
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["acImg_e"]["name"], PATHINFO_EXTENSION);
    $studentImg = $strDatetime.".".$extension;
    if( move_uploaded_file($_FILES["acImg_e"]["tmp_name"], "./files/".$studentImg) ){
        $sqlGetImg = "SELECT `acImg` FROM `marketing` WHERE `acId` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);
        $arrGetImgParam = [
            (int)$_POST['acId_input']
        ];
        $stmtGetImg->execute($arrGetImgParam);
        if($stmtGetImg->rowCount() > 0){
            $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];
            if( $arrImg["acImg"] !== NULL){
                @unlink(".files/".$arrImg["acImg"]);
            }

            $sql.= ",";
            $sql.= " `acImg` = ? ";
            $arrParam[] = $studentImg;
        }
    }
}

$sql.= "WHERE `acId` = ? ";
$arrParam[] = (int)$_POST['acId_input'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if( $stmt->rowCount() > 0 ){//彈回編輯頁
    header('refresh: 1; url=ac_index.php');
    echo "更新成功";
} else {//彈回編輯頁
    header("Refresh: 1000; url=ac_index.php");
    echo "沒有任何更新";
}