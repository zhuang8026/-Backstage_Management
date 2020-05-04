// JQUERY --- william --- 修改
function Edit_click(id){
    console.log(id);
    $img_name =  $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src'))
    // console.log($img_name);
    // console.log($('img#itemImg_d_img').attr('src', $img_name) );
    // console.log( $('.storeDes'+id).eq(0).html() );
    // console.log(document.getElementsByClassName('storeusername'+id)[0].innerHTML.substring(1).split('0').join(""))
    let editUsername = document.getElementsByClassName('storeusername'+id)[0].innerHTML.substring(1).split('0').join("");
    $('#itemId_input').val(id); // hiiden id
    $('input#yyeditName').val( $('.itemName'+id).eq(0).html() );        // itemName
    $('#yyeditIdSelect').val(editUsername);                             // select_ownr_change 
    $('img#itemImg_d_img').attr('src', $img_name);                      // itemImg
    $('textarea#yyeditIdcontent').val( $('.storeDes'+id).eq(0).html() ) // select id
    
};
