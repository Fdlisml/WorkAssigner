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

// Modal box
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}