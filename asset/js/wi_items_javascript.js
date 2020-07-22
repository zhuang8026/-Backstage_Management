// chart.js
function getTableData(table) {
    // 這邊 增加 陣列
    const dataArray =[], 
        IdArray = [],
        NameArray = [],
        ImageArray = [],
        ColorArray = [],
        NumberArray = [],
        TypeArray = []
        // PriceArray = [],
        // QuantityArray = [],
        // StarArray = [],
        // SalesArray = [];

    // loop table rows
    // 將 陣列 放入 table 
    table.rows({ search: "applied" }).every(function() {
        const data = this.data();
        IdArray.push(parseInt(data[1].replace(/\,/g, "")));
        NameArray.push(data[2]);
        ImageArray.push(data[3]);
        ColorArray.push(parseInt(data[4].replace(/\,/g, "")));
        NumberArray.push(data[5]);
        TypeArray.push(data[6]);
        // PriceArray.push(parseInt(data[7].replace(/\,/g, "")));
        // QuantityArray.push(parseInt(data[8].replace(/\,/g, "")));
        // StarArray.push(parseInt(data[9].replace(/\,/g, "")));
        // SalesArray.push(parseInt(data[10].replace(/\,/g, "")));
    });


    // store all data in dataArray
    // 將 table 的 陣列 push 到 dataArray 並 返回值 
    dataArray.push(IdArray, NameArray, ImageArray, ColorArray, NumberArray, TypeArray);

    return dataArray;
}
// chart.js
function createHighcharts(data) {
    // console.log(data)
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
            // createHighcharts(tableData);
        }
    });
}
// chart.js
let draw = false;
function init() {
    // initialize DataTables
    const table = $("#dt-table").DataTable({
        "columnDefs": [ {
            // "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[1]]
    } );
    // const table = $("#dt-table").DataTable();
    // get table data
    const tableData = getTableData(table);
    // create Highcharts
    createHighcharts(tableData);
    // table events
    setTableEvents(table);
}
init();


