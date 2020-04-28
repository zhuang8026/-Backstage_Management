<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新增訂單</title>
    </head>
<body>
<form name="myForm" method="POST" action="./addOrder.php" >
<table>
    <thead>
        <tr>
            <th>使用者帳號</th>
            <th>商品編號</th>          
            <th>單價</th>          
            <th>購買數量</th>          
            <th>小計</th>
            <th>付款方式編號</th>    
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text" name="username" id="username" value=""/>
            </td>
            <td>
                <input type="text" name="pssn" id="pssn" value=""/>
            </td>            
            <td>
                <input type="text" name="checkPrice" id="checkPrice" value=""/>
            </td>            
            <td>
                <input type="text" name="checkQty" id="checkQty" value=""/>
            </td>            
            <td>
                <input type="text" name="checkSubtotal" id="checkSubtotal" value=""/>
            </td>            
            <td>
                <input type="text" name="paymentTypeId" id="paymentTypeId" value=""/>
            </td>            
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>

</body>
</html>