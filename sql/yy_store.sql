SELECT `storeId`, `storeName`, `storeLogo`, `storeDescription`,`storeItemsId`, `storeOpened`, `createTime`,`items`.`itemstoreNumber`,`users`.`id`
FROM `stores`
LEFT JOIN `items`
ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
LEFT JOIN `users`
ON `items`.`itemstoreNumber` = `users`.`id`
GROUP BY `storeId`

SELECT `storeId`, `storeName`, `storeLogo`, `storeDescription`,`storeItemsId`, `storeOpened`, `createTime`, 
        `items`.`itemstoreNumber`, `users`.`id`, 
        COUNT(`storeId`)
FROM `stores`
LEFT JOIN `items`
ON `stores`.`storeItemsId` = `items`.`itemstoreNumber`
LEFT JOIN `users`
ON `items`.`itemstoreNumber` = `users`.`id`
GROUP BY `storeId`