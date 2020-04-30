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
        `address` = ?,
        `isActivated` = ?,
        `shopopen` = ? ";

$arrParam = [
    $_POST['username_e'],
    $_POST['pwd_e'],
    $_POST['name_e'],
    $_POST['gender_e'],
    $_POST['phoneNumber_e'],
    $_POST['card_e'],
    $_POST['birthday_e'],
    $_POST['address_e'],
    $_POST['isActivated_e'],
    $_POST['shopopen_e']
];

// echo "<pre>";
// print_r( $arrParam );
// exit();

if( $_FILES["userlogo_e"]["error"] === 0 ){
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["userlogo_e"]["name"], PATHINFO_EXTENSION);
    $studentImg = $strDatetime.".".$extension;
    if( move_uploaded_file($_FILES["userlogo_e"]["tmp_name"], "./files/".$studentImg) ){
        $sqlGetImg = "SELECT `userlogo` FROM `users` WHERE `id` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);
        $arrGetImgParam = [
            (int)$_POST['sellerId_input']
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
$arrParam[] = (int)$_POST['sellerId_input'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if( $stmt->rowCount() > 0 ){//彈回編輯頁
    header('refresh: 1; url=alice_seller_index.php');
    echo "更新成功";
} else {//彈回編輯頁
    header("Refresh: 1; url=alice_seller_index.php");
    echo "沒有任何更新";
}