//  night mode
const toggleBtn = document.getElementById('dn');
const toggleHandler = document.querySelector('.toggle__handler');
const stars = document.querySelectorAll('.star');
const craters = document.querySelectorAll('.crater');
const secMain = document.querySelector('.secMain')
const card1 = document.querySelector('.card1');
const card2 = document.querySelector('.card2');
const recentOrders = document.querySelector('.recentOrders');
const table = document.querySelector('table');
const tds = document.querySelectorAll('.details table td');
const ths = document.querySelectorAll('.details table th');
const recentCustomers = document.querySelector('.recentCustomers');
const circle = document.querySelector('.circle');
const input = document.querySelector('input[type="text"]');
const textAreas = document.querySelectorAll('textarea');
const card2Element = document.querySelector(".container2");
const dayElement = card2Element.querySelector("#day");
const nightElement = card2Element.querySelector("#night");

toggleBtn.addEventListener('change', function () {
    if (this.checked) {
        toggleHandler.classList.add('night-mode');
        stars.forEach(star => star.classList.add('night-mode'));
        craters.forEach(crater => crater.classList.add('night-mode'));
        secMain.classList.add('night-mode');
        card1.classList.add('night-mode-card');
        card2.classList.add('night-mode-card');
        recentOrders.classList.add('night-mode-card');
        table.style.borderTop = '2px solid var(--white)';
        tds.forEach(function (td) {
            td.style.borderColor = 'var(--white)';
        });
        ths.forEach(function (th) {
            th.style.borderColor = 'var(--white)';
        });
        recentCustomers.classList.add('night-mode-card');
        circle.style.backgroundColor = 'var(--black1)';
        input.style.outline = '2px solid var(--white)';
        input.style.backgroundColor = 'var(--black1)';
        input.style.color = 'var(--white)';
        textAreas.forEach(function (textArea) {
            textArea.style.border = '2px solid var(--white)';
            textArea.style.backgroundColor = 'var(--black1)';
            textArea.style.color = 'var(--white)';
        });
        dayElement.style.display = "none";
        nightElement.style.display = "block";
    } else {
        toggleHandler.classList.remove('night-mode');
        stars.forEach(star => star.classList.remove('night-mode'));
        craters.forEach(crater => crater.classList.remove('night-mode'));
        secMain.classList.remove('night-mode');
        card1.classList.remove('night-mode-card');
        card2.classList.remove('night-mode-card');
        recentOrders.classList.remove('night-mode-card');
        table.style.borderTop = '2px solid var(--black1)';
        tds.forEach(function (td) {
            td.style.borderColor = 'var(--black1)';
        });
        ths.forEach(function (th) {
            th.style.borderColor = 'var(--black1)';
        });
        recentCustomers.classList.remove('night-mode-card');
        circle.style.backgroundColor = 'var(--white)';
        input.style.outline = '2px solid var(--black3)';
        input.style.backgroundColor = 'var(--white)';
        input.style.color = 'var(--black1)';
        textAreas.forEach(function (textArea) {
            textArea.style.outline = '2px solid var(--black3)';
            textArea.style.backgroundColor = 'var(--white)';
            textArea.style.color = 'var(--black1)';
        });
        dayElement.style.display = "block";
        nightElement.style.display = "none";
    }
});
