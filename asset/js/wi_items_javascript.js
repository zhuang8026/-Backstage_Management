 // 全選功能
$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

});

// chart.js
function getTableData(table) {
    // 這邊 增加 陣列
    const dataArray =[], 
        IdArray = [],
        NameArray = [],
        ImageArray = [],
        ColorArray = [],
        BrandArray = [],
        TypeArray = [],
        PriceArray = [],
        QuantityArray = [],
        StarArray = [],
        SalesArray = [];

    // loop table rows
    // 將 陣列 放入 table 
    table.rows({ search: "applied" }).every(function() {
        const data = this.data();
        IdArray.push(parseInt(data[1].replace(/\,/g, "")));
        NameArray.push(data[2]);
        ImageArray.push(data[3]);
        ColorArray.push(parseInt(data[4].replace(/\,/g, "")));
        BrandArray.push(data[5]);
        TypeArray.push(data[6]);
        PriceArray.push(parseInt(data[7].replace(/\,/g, "")));
        QuantityArray.push(parseInt(data[8].replace(/\,/g, "")));
        StarArray.push(parseInt(data[9].replace(/\,/g, "")));
        SalesArray.push(parseInt(data[10].replace(/\,/g, "")));
    });


    // store all data in dataArray
    // 將 table 的 陣列 push 到 dataArray 並 返回值 
    dataArray.push(IdArray, NameArray, ImageArray, ColorArray, BrandArray, TypeArray, PriceArray, QuantityArray,StarArray,SalesArray);

    return dataArray;
}
// chart.js
function createHighcharts(data) {
    console.log(data)
    Highcharts.setOptions({
        lang: {
            thousandsSep: ","
        }
    });
    
    Highcharts.chart("chart", {
        title: {
            text: "產品分析圖"
        },
        subtitle: {
            text: "產品訊息顯示"
        },
        xAxis: [
        {
            categories: data[1],
            labels: {
                rotation: -45
            }
        }
        ],
        yAxis: [
            {
                // first yaxis
                title: {
                    text: "庫存量 / 評分數"
                }
            },
            {
                // secondary yaxis
                title: {
                    text: "銷售量"
                },
                min: 0,
                opposite: true
            }
        ],
        series: [
            {
                name: "庫存量",
                color: "#211E55",
                type: "spline", //column spline
                data: data[7],
                tooltip: {
                    valueSuffix: "/個"
                }
            },
            {
                name: "評分數",
                color: "#4E4F97",
                type: "column", //column spline
                data: data[8],
                tooltip: {
                    valueSuffix: "/分"
                }
            },
            {
                name: "銷售量",
                color: "#FF404E",
                type: "spline", //column spline
                data: data[9],
                yAxis: 1,
                tooltip: {
                    valueSuffix: "/個"
                }
            }
            
        ],
        tooltip: {
            shared: true
        },
        search: {
            backgroundColor: "#4E4F97",
            shadow: true
        },
        credits: {
            
        },
        noData: {
            style: {
                fontSize: "14px"
            }
        }
    });
}
// chart.js
function setTableEvents(table) {
    // listen for page clicks
    table.on("page", () => {
        draw = true;
    });

    // listen for updates and adjust the chart accordingly
    table.on("draw", () => {
        if (draw) {
            draw = false;
        } else {
            const tableData = getTableData(table);
            createHighcharts(tableData);
        }
    });
}
// chart.js
let draw = false;
function init() {
    // initialize DataTables
    const table = $("#dt-table").DataTable();
    // get table data
    const tableData = getTableData(table);
    // create Highcharts
    createHighcharts(tableData);
    // table events
    setTableEvents(table);
}
init();


// JQUERY --- william --- 修改
function data_text(id){
    // console.log($('.itemName'+id).eq(0).html());
    // console.log($('.colorid'+id).eq(0).html());
    // console.log( $('.itemImg'+id).eq(0).eq(0));
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).html()) );
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src')) );
    // console.log( $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src').substr(21)) );
    $img_name =  $.trim($('.itemImg'+id).eq(0).eq(0).children('img').attr('src'))
    console.log($img_name);
    console.log($('img#itemImg_d_img').attr('src', $img_name) );
    $('#itemId_input').val(id); // hiiden id
    $('input#itemName_d').val( $('.itemName'+id).eq(0).html() );        // itemName
    $('img#itemImg_d_img').attr('src', $img_name);                              // itemImg
    $('input#colorid_d').val( $('.colorid'+id).eq(0).html() );          // colorid
    $('input#itemsbrand_d').val( $('.itemsbrand'+id).eq(0).html() );    // itemsbrand
    $('input#itemstype_d').val( $('.itemstype'+id).eq(0).html() );      // itemstype
    $('input#itemPrice_d').val( $('.itemPrice'+id).eq(0).html() );      // itemPrice
    $('input#itemQty_d').val( $('.itemQty'+id).eq(0).html() );          // itemQty
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
