// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
   list.forEach((item) => {
      item.classList.remove("hovered");
   });
   this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouser", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
   navigation.classList.toggle("active");
   main.classList.toggle("active");
};

// jam
// To run the function on load
document.getElementById("txt").addEventListener("load", startTime());

function startTime() {
   var today = new Date();
   var h = today.getHours();

   // To print AM/PM and 12 hour format  
   if (h > 12) {
      var meridiem = "PM";
      h = h - 12;
   } else {
      meridiem = "AM";
   }

   var m = today.getMinutes();

   // add a zero in front of numbers<10
   h = checkTime(h);
   m = checkTime(m);

   document.getElementById("txt").innerHTML = h + ":" + m + " " + meridiem;

   // To update time every second
   var t = setTimeout(function () {
      startTime()
   }, 1000);
}

function checkTime(i) {
   if (i < 10) {
      i = "0" + i;
   }
   return i;
}


// end jam

// tanggal
const date = document.getElementById("date");
const day = document.getElementById("day");
const month = document.getElementById("month");
const year = document.getElementById("year");

const today = new Date();

const weekDays = [
   "Sun",
   "Mon",
   "Tue",
   "Wed",
   "Thu",
   "Fri",
   "Sat"
];

const allMonths = [
   "Jan",
   "Feb",
   "Mar",
   "Apr",
   "May",
   "Jun",
   "Jul",
   "Aug",
   "Sep",
   "Oct",
   "Nov",
   "Dec"
];

date.innerHTML = (today.getDate() < 10 ? "0" : "") + today.getDate();
day.innerHTML = weekDays[today.getDay()];
month.innerHTML = allMonths[today.getMonth()];
year.innerHTML = today.getFullYear();
// end tanggal

//Selamat
const say = document.getElementById('say');

function getGreeting() {
   var currentTime = new Date();
   var currentHour = currentTime.getHours();

   if (currentHour >= 0 && currentHour < 12) {
      return "Good Morning";
   } else if (currentHour >= 12 && currentHour < 18) {
      return "Good Afternoon";
   } else {
      return "Good Evening";
   }
}
var greeting = getGreeting();

say.textContent = greeting;

// range
const rangeInput = document.querySelector(".range");
const rangeValue = document.querySelector(".rangeValue");
rangeInput.addEventListener('input', () => {
   rangeValue.textContent = rangeInput.value + '%';
});

//monn/day
document.addEventListener("DOMContentLoaded", function () {
   const card2Element = document.querySelector(".container2");
   const dayElement = card2Element.querySelector("#day");
   const nightElement = card2Element.querySelector("#night");

   const currentTime = new Date().getHours();

   if (currentTime >= 18 || currentTime < 6) {
      // Sembunyikan elemen siang, tampilkan elemen malam
      dayElement.style.display = "none";
      nightElement.style.display = "block";
   } else {
      // Tampilkan elemen siang, sembunyikan elemen malam
      dayElement.style.display = "block";
      nightElement.style.display = "none";
   }
});

//  night mode

const toggleBtn = document.getElementById('dn');
const toggleHandler = document.querySelector('.toggle__handler');
const stars = document.querySelectorAll('.star');
const craters = document.querySelectorAll('.crater');
// night-mode
const secMain = document.querySelector('.secMain')
const card1 = document.querySelector('.card1');
const card2 = document.querySelector('.card2'); 
const recentorders = document.querySelector('.recentOrders');
const wadahTable = document.querySelector('table');
const td = document.querySelector('.details table td');


toggleBtn.addEventListener('change', function () {
   if (this.checked) {
      // Night Mode
      toggleHandler.classList.add('night-mode');
      stars.forEach(star => star.classList.add('night-mode'));
      craters.forEach(crater => crater.classList.add('night-mode'));
      // night-mode
      secMain.classList.add('night-mode');
      card1.classList.add('night-mode-card');
      card2.classList.add('night-mode-card');
      recentorders.classList.add('night-mode-card');
      wadahTable.classList.add('table-night');
      td.classList.add('td-night');
   } else {
      // Normal Mode
      toggleHandler.classList.remove('night-mode');
      stars.forEach(star => star.classList.remove('night-mode'));
      craters.forEach(crater => crater.classList.remove('night-mode'));
      // night-mode
      secMain.classList.remove('night-mode');
      card1.classList.remove('night-mode-card');
      card2.classList.remove('night-mode-card');
      recentorders.classList.remove('night-mode-card');
      wadahTable.classList.remove('table-night');
      td.classList.remove('td-night');

   }
   console.log("Toggle checked: " + this.checked);
});

// Fungsi untuk menampilkan loader
function showLoader() {
   var loader = document.querySelector('.container-loader');
   loader.style.display = 'block';
}

// Fungsi untuk menyembunyikan loader
function hideLoader() {
   var loader = document.querySelector('.container-loader');
   loader.style.display = 'none';
}

window.addEventListener('beforeunload', function () {
   setTimeout(() => {
      hideLoader();
   }, 3000);
   showLoader();
});
