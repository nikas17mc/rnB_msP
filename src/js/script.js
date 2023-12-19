const body = document.body;

let info;
let cur = document.getElementById('cur');
let url = "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur/thb.json?" + Math.random();
let downB = document.getElementById('downB');
let upB = document.getElementById('upB');
function numberValidate(number) {
    number.value = number.value.replace(/[^0-9,.]/g, "");
};
window.addEventListener("load", function () {
    fetchCurrency()
});
function fetchCurrency() {
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
window.onscroll = function () {
    document.body.scrollTop > 400 || document.documentElement.scrollTop > 400 ? downB.style.display = "none" : downB.style.display = "block";
    document.body.scrollTop > 450 || document.documentElement.scrollTop > 450 ? upB.style.display = "block" : upB.style.display = "none";
};
function down_jump() {
    window.scrollTo({
        top: 3000,
        behavior: 'smooth'
    });
};
function up_jump() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};


const opn = document.querySelector('[data-open-modal]');
const cls = document.querySelector('[data-close-modal]');
const mdl = document.querySelector('[data-modal]');
opn.addEventListener("click", () => {
    mdl.showModal();
});
cls.addEventListener("click", () => {
    mdl.close();
});

// Sign In and Sign Up Page
let logForm = document.getElementById("logForm");
let regForm = document.getElementById("regForm");
let signs = document.querySelector(".signUp-In");
let myProfile = document.getElementById("myProfile").style.display = "none";
let signBox = document.getElementById("signBox");
signs.addEventListener("click", function () {
    let popup = document.createElement('div');
    body.style.overflow = "hidden";
    popup.classList.add("popupBox")
    popup.innerHTML = `
        <div class="blur"></div>
        <div class="popup">
            <div class="loginSwitcher">
                <a href="#" onclick="switchForm('logForm')" id="switchLogin">Sign Up</a> / 
                <a href="#" onclick="switchForm('regForm')" id="switchRegis">Sign In</a>
            </div>
            <div class="flipper_box">
                <div class="flipper_form">
                    <!-- Anmeldeformular -->
                    <form action="" method="post" id="logForm">
                        <h2>Log in to your account</h2>
                        <label for="email1">Email address:</label><br>
                        <input type="text" name="email1" id="email1" required><br>
                        <label for="pass1">Password:</label><br>
                        <input type="password" name="pass1" id="pass1" required><br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                
                    <!-- Registrierungsformular -->
                    <form action="/register" method="get" id="regForm">
                        <h2>Create new account</h2>
                        <label for="email2">Email address:</label><br>
                        <input type="email" name="email" id="email2" required><br>
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" id="username" required><br>
                        <label for="pass2">Password:</label><br>
                        <input type="password" name="pass" id="pass2" required><br>
                        <input type="submit" value="Register" class="btn btn-secondary">
                    </form>
                </div>
            </div>
            <!-- Schließen-Button -->
            <div class="popup-close">
                <p id="closePopup" class="popup-close_button" onclick="closePopup()">X</p>
            </div>
        </div>
        `;
    body.appendChild(popup);
    let close = document.getElementById("closePopup");
    close.addEventListener('click', function () {
        popup.remove();
        body.style.overflow = "scroll";
    });
});
function switchForm(formId) {
    let flipper = document.querySelector(".flipper_form");
    if (formId == 'logForm') {
        // Zeige das Anmeldeformular und verstecke das Registrierungsformular
        flipper.classList.add("flip");
    } else if (formId == 'regForm') {
        // Zeige das Registrierungsformular und verstecke das Anmeldeformular
        flipper.classList.remove("flip");
    }
};
