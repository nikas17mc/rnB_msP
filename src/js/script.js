let info; 
let cur = document.getElementById('cur'); 
let url = "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur/thb.json?" + Math.random(); 
let downB = document.getElementById('downB');
let upB = document.getElementById('upB');
function numberValidate(number) { number.value = number.value.replace(/[^0-9,.]/g, ""); 
}; 
window.addEventListener("load",function(){ 
    fetchCurrency() 
}); 
function fetchCurrency(){ 
    fetch(url).then(response => response.json()).then(data => { 
    info = data.thb; 
    cur.innerHTML = info.toFixed(4) + " ฿"; 
    }).catch(error => console.error(error, "Couldn't fetch currency of THB!"));
};
document.getElementById("amount").on = function () {
    let put = document.getElementById("amount"); 
    let res = document.getElementById("result");
    put.value == 0 ? res.innerHTML = "Endergebnis:" + " " : res.innerHTML = "Endergebnis:" + " " + (parseFloat(put.value) * info).toFixed(2) + " ฿";
};
window.onscroll = function() {
    document.body.scrollTop > 400 || document.documentElement.scrollTop > 400 ? downB.style.display = "none" : downB.style.display = "block";
    document.body.scrollTop > 460 || document.documentElement.scrollTop > 460 ? upB.style.display = "block" : upB.style.display = "none";
};
function down_jump(){
    window.scrollTo({
        top: 1500,
        behavior: 'smooth'
});
};
function up_jump(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
});
};


const opn = document.querySelector('[data-open-modal]');
const cls = document.querySelector('[data-close-modal]');
const mdl = document.querySelector('[data-modal]');
opn.addEventListener("click", () =>{
    mdl.showModal();
});
cls.addEventListener("click", () =>{
    mdl.close();
});