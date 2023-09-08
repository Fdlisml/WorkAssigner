// add hovered class to selected list item
const list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("onmouse", activeLink));

// Menu Toggle
const toggle = document.querySelector(".toggle");
const navigation = document.querySelector(".navigation");
const main = document.querySelector(".main");

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
};

// dark mode
const toggleBtn = document.getElementById('dn');
const toggleHandler = document.querySelector('.toggle__handler');
const stars = document.querySelectorAll('.star');
const craters = document.querySelectorAll('.crater');
const secMain = document.querySelector('.secMain');
const recentOrders = document.querySelector('.recentOrders');
const recentCustomers = document.querySelector('.recentCustomers');
const tds = document.getElementsByTagName('table tr td');


toggleBtn.addEventListener('change', function () {
    if (this.checked) {
        toggleHandler.classList.add('night-mode');
        stars.forEach(star => star.classList.add('night-mode'));
        craters.forEach(crater => crater.classList.add('night-mode'));
        secMain.classList.add('night-mode');
        recentOrders.classList.add('night-mode-card');
        recentCustomers.classList.add('night-mode-card');
        tds.forEach(function (td) {
            td.style.border = '1px solid var(--white)';
        });
    } else {
        toggleHandler.classList.remove('night-mode');
        stars.forEach(star => star.classList.remove('night-mode'));
        craters.forEach(crater => crater.classList.remove('night-mode'));
        secMain.classList.remove('night-mode');
        recentOrders.classList.remove('night-mode-card');
        recentCustomers.classList.remove('night-mode-card');
        tds.forEach(function (td) {
            td.style.border = '1px solid var(--black3)';
        });
    }
});


// Loader functions
function showLoader() {
    document.querySelector('.container-loader').style.display = 'block';
}

function hideLoader() {
    document.querySelector('.container-loader').style.display = 'none';
}

window.addEventListener('beforeunload', () => {
    setTimeout(hideLoader, 3000);
    showLoader();
});
