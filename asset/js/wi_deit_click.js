// JQUERY --- william --- 修改
function Edit_click(id){
    // console.log($('.itemName'+id).eq(0).html());
    // console.log($('.colorid'+id).eq(0).html());
    // console.log( $('.itemImg'+id).eq(0).eq(0));
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).html()) );
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src')) );
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src').substr(21)) );
    // console.log(id);
    $img_name =  $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src'))
    // console.log($img_name);
    // console.log($('img#itemImg_d_img').attr('src', $img_name) );
    // console.log($('.colorid'+id).eq(0).attr('id'));
    // console.log($('.colorid'+id).eq(0).attr('data-color'));
    $('#itemId_input').val(id); // hiiden id
    $('input#itemName_d').val( $('.itemName'+id).eq(0).html() );        // itemName
    $('img#itemImg_d_img').attr('src', $img_name);                      // itemImg
    $('input#colorid_d').val( $('.colorid'+id).eq(0).attr('id') );      // colorid_d
    $('span#colorid_span').css("background-color", $('.colorid'+id).eq(0).attr('data-color')); // colorid_span
    $('input#itemsNumber_d').val( $('.itemsNumber'+id).eq(0).html() );    // itemsNumber
    $('input#itemstype_d').val( $('.itemstype'+id).eq(0).html() );      // itemstype
    // $('input#itemPrice_d').val( $('.itemPrice'+id).eq(0).html() );      // itemPrice
    // $('input#itemQty_d').val( $('.itemQty'+id).eq(0).html() );          // itemQty
};

// JAVASCRIPT --- william --- 修改
// function data_text(id){
//     console.log(id);
//     console.log(document.getElementsByClassName('itemName'+id)[0])
//     console.log(document.getElementsByClassName('itemName'+id))
//     // console.log(document.getElementsByClassName('itemName'+id)[0].innerHTML);
//     // console.log(document.querySelectorAll("input#itemName_d")[0]);
//     let a = document.getElementsByClassName('itemName'+id)[0].innerHTML;
//     document.querySelectorAll("input#itemName_d")[0].value = a;
// }