document.getElementById("axiosItemsClick").addEventListener("click", (e)=>{
    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "../../api/wi_add_api_ajax.php",
        dataType: "json",
        data: { 
            itemName: $("input[name='itemName']").val(),
            itemImg: $("input[name='itemImg[]']").val(),
            colorid: $("input[name='colorid']").val(),
            itemsNumber: $("input[name='itemsNumber']").val(),
            itemstype: $("select[name='itemstype']").val(),
            // itemPrice: $("input[name='itemPrice']").val(),
            // itemQty: $("input[name='itemQty']").val(),
            // itemscontent: $("textarea[name='itemscontent']").val(),
            // sellersId: Number($("select[name='sellersId']").val())
        }
    })
    .done(function( json ) {
        alert(json.info);
        console.log(json.data);
        $('#dt-table tbody').prepend(`<tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" class="checkboxValue name="options[]">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td>${json.data.itemId}</td>
            <td>${json.data.itemName}</td>
        </tr>`);
    })
    .fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
});