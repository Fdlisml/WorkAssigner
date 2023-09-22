// dark mode
const toggleBtn = document.getElementById('dn');
const toggleHandler = document.querySelector('.toggle__handler');
const stars = document.querySelectorAll('.star');
const craters = document.querySelectorAll('.crater');
const secMain = document.querySelector('.secMain');
const recentOrders = document.querySelector('.recentOrders');
const recentCustomers = document.querySelector('.recentCustomers');
const ths = document.querySelectorAll('.recentCustomers thead th');
const tds = document.querySelectorAll('.recentCustomers table tr td ');

toggleBtn.addEventListener('change', function () {
    if (this.checked) {
        toggleHandler.classList.add('night-mode');
        stars.forEach(star => star.classList.add('night-mode'));
        craters.forEach(crater => crater.classList.add('night-mode'));
        secMain.classList.add('night-mode');
        ths.forEach(function (th) {
            th.style.backgroundColor = '#222222';
            th.style.color = 'white';
            th.style.borderColor = 'white';
        });
        tds.forEach(function (td) {
            td.style.borderColor = 'white';
        });
        recentCustomers.classList.add('night-mode-card');
        recentOrders.classList.add('night-mode-card');
    } else {
        toggleHandler.classList.remove('night-mode');
        stars.forEach(star => star.classList.remove('night-mode'));
        craters.forEach(crater => crater.classList.remove('night-mode'));
        secMain.classList.remove('night-mode');
        ths.forEach(function (th) {
            th.style.backgroundColor = 'white';
            th.style.color = '#222222';
            th.style.borderColor = 'black';
        });
        tds.forEach(function (td) {
            td.style.borderColor = 'var(--black3)';
        });
        recentCustomers.classList.remove('night-mode-card');
        recentOrders.classList.remove('night-mode-card');
    }
});