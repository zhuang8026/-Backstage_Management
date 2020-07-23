document.getElementById("axiosItemsClick").addEventListener("click", (e)=>{
    e.preventDefault();
    var file_data = $("#itemImg").prop("files")[0];   
    if(file_data != undefined) {
        console.log('yes')
        var form_data = new FormData();                  
        form_data.append('file', file_data);
    }
    console.log('form_data',form_data);
    // $.ajax({
    //     method: "POST",
    //     url: "../../api/wi_add_api_ajax.php",
    //     dataType: "json",
    //     data: { 
    //         itemName: $("input[name='itemName']").val(),
    //         // itemImg: $("input[name='itemImg']").val(),
    //         itemImg: form_data,
    //         colorid: $("input[name='colorid']").val(),
    //         itemsNumber: $("input[name='itemsNumber']").val(),
    //         itemstype: $("select[name='itemstype']").val(),
    //         // itemPrice: $("input[name='itemPrice']").val(),
    //         // itemQty: $("input[name='itemQty']").val(),
    //         // itemscontent: $("textarea[name='itemscontent']").val(),
    //         // sellersId: Number($("select[name='sellersId']").val())
    //     }
    // })
    // .done(function( json ) {
    //     alert(json.info);
    //     console.log(json.data);
    //     $('#dt-table tbody').prepend(`<tr>
    //         <td>
    //             <span class="custom-checkbox">
    //                 <input type="checkbox" class="checkboxValue name="options[]">
    //                 <label for="checkbox1"></label>
    //             </span>
    //         </td>
    //         <td>${json.data.itemId}</td>
    //         <td>${json.data.itemName}</td>
    //     </tr>`);
    // })
    // .fail(function( jqXHR, textStatus ) {
    //     alert( "Request failed William: " + textStatus );
    // });
});