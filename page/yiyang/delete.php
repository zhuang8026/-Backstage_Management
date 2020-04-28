<?php
    require_once('../../db.inc.php');
    $sql = "DELETE FROM `store`
            WHERE `storeId` = ? ";
    $arrparam = [
        $_GET['deleteId']
    ];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrparam);

    if($stmt->rowCount() > 0) {
        header("Refresh: 0; url=./shopper.php");
    } else {
        header("Refresh: 100; url=./shopper.php");
    }