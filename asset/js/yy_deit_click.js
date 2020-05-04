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
    // console.log( $('.storeDes'+id).eq(0).html() );
    $('#itemId_input').val(id); // hiiden id
    $('input#yyeditName').val( $('.itemName'+id).eq(0).html() );        // itemName
    $('#yyeditIdSelect').val(id);                                       // select_ownr_change 
    $('img#itemImg_d_img').attr('src', $img_name);                      // itemImg
    $('textarea#yyeditIdcontent').val( $('.storeDes'+id).eq(0).html() ) // select id
    
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
//     document.getElementById('editIdSelect').value=id; 
// }