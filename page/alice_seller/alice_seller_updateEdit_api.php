<?php
//引入判斷是否登入機制
require_once('../../checkSession.php');

//引用資料庫連線
require_once('../../db.inc.php');

$sql = "UPDATE `users` 
        SET 
        `username` = ?,
        `pwd` = ?,
        `name` = ?,
        `gender` = ?,
        `phoneNumber` = ?,
        `card` = ?,
        `birthday` = ?,
        `address` = ? ,
        `isActivated` = ? ";

$arrParam = [
    $_POST['username'],
    $_POST['pwd'],
    $_POST['name'],
    $_POST['gender'],
    $_POST['phoneNumber'],
    $_POST['card'],
    $_POST['birthday'],
    $_POST['address'],
    $_POST['isActivated']
];

if( $_FILES["userlogo"]["error"] === 0 ){
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["userlogo"]["name"], PATHINFO_EXTENSION);
    $studentImg = $strDatetime.".".$extension;
    if( move_uploaded_file($_FILES["userlogo"]["tmp_name"], "./files/".$studentImg) ){
        $sqlGetImg = "SELECT `userlogo` FROM `users` WHERE `id` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);
        $arrGetImgParam = [
            (int)$_POST['editId']
        ];
        $stmtGetImg->execute($arrGetImgParam);
        if($stmtGetImg->rowCount() > 0){
            $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];
            if( $arrImg["userlogo"] !== NULL){
                @unlink("./files/".$arrImg["userlogo"]);
            }

            $sql.= ",";
            $sql.= " `userlogo` = ? ";
            $arrParam[] = $studentImg;
        }
    }
}

$sql.= "WHERE `id` = ? ";
$arrParam[] = (int)$_POST['editId'];
// print_r($sql);
// exit();
$stmt = $pdo->prepare($sql);
// print_r($stmt);
// exit();
$stmt->execute($arrParam);
if( $stmt->rowCount() > 0 ){//彈回編輯頁
    header('refresh: 3000; url=./alice_seller_index.php');
    echo "更新成功";
} else {//彈回編輯頁
    header("Refresh: 3000; url=./alice_seller_index.php");
    echo "更新失敗";
}