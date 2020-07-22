// const axios = require('axios');
console.log(axios);
document.getElementById("axiosItemsClick").addEventListener("click", ()=>{
    axios({
        method: 'post',
        headers: { 'content-type': 'application/x-www-form-urlencoded' },
        url: '../../api/wi_add_api_axios.php',
        data: {
            "itemName": document.querySelectorAll("input[name='itemName']")[0].value,
            "colorid": document.querySelectorAll("input[name='colorid']")[0].value,
            "itemsbrand": document.querySelectorAll("input[name='itemsbrand']")[0].value,
            "itemstype": document.querySelectorAll("select[name='itemstype']")[0].value,
            "itemPrice": document.querySelectorAll("input[name='itemPrice']")[0].value,
            "itemQty": document.querySelectorAll("input[name='itemQty']")[0].value,
            // "itemscontent": document.querySelectorAll("textarea[name='itemscontent']")[0].value,
            "itemstoreNumber": document.querySelectorAll("select[name='sellersId']")[0].value
        }
    })
    .then((response) => {
        console.log(response);
        console.log(response.data);
    })
    .catch((eerrorr)=>{
        console.log(error);
    })
});