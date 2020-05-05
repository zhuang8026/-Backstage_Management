document.getElementById("member_add").addEventListener("click", ()=>{
    document.getElementById('username').value = `s0${parseInt(document.getElementsByTagName('tr')[1].childNodes[3].innerHTML.split("s").join(""))+1}`;
});