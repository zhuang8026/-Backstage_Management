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


function getTableData(table) {
    // 這邊 增加 陣列
    const dataArray = [],
        countryArray = [],
        populationArray = [],
        densityArray = [],
        sellerArray = [],
        nameArray = [];

    // loop table rows
    // 將 陣列 放入 table 
    table.rows({ search: "applied" }).every(function() {
        const data = this.data();
        countryArray.push(data[0]);
        populationArray.push(parseInt(data[1].replace(/\,/g, "")));
        densityArray.push(parseInt(data[2].replace(/\,/g, "")));
        sellerArray.push(parseInt(data[3].replace(/\,/g, "")));
        nameArray.push(data[4]);
    });

    // store all data in dataArray
    // 將 table 的 陣列 push 到 dataArray 並 返回值 
    dataArray.push(countryArray, populationArray, densityArray, sellerArray, nameArray);

    return dataArray;
}

function createHighcharts(data) {
    Highcharts.setOptions({
        lang: {
            thousandsSep: ","
        }
    });
    
    Highcharts.chart("chart", {
        title: {
            text: "產品資料圖"
        },
        subtitle: {
            text: "產品訊息顯示"
        },
        xAxis: [
        {
            categories: data[4],
            labels: {
                rotation: -45
            }
        }
        ],
        yAxis: [
            {
                // first yaxis
                title: {
                    text: "庫存量"
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
                type: "column", //column spline
                data: data[2],
                tooltip: {
                    valueSuffix: "/個"
                }
            },
            {
                name: "銷售量",
                color: "#FF404E",
                type: "column", //column spline
                data: data[3],
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
                fontSize: "16px"
            }
        }
    });
}

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