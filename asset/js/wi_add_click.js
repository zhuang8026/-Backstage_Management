$('.colorname').on('click', function(){
    // .addClass("add_icon_click");
    if($(this).children('i').hasClass("add_icon_click")){
        $(this).children('i').removeClass("add_icon_click");
        // $(this).siblings().children('i').removeClass("add_icon_click");
    } else {
        $(this).children('i').addClass("add_icon_click");
        $(this).siblings('li').children('i').removeClass("add_icon_click");
    }
})