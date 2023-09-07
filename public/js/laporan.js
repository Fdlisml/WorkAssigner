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

// jam
document.getElementById("txt").addEventListener("load", startTime());

function startTime() {
   const today = new Date();
   let h = today.getHours();

   if (h > 12) {
      h -= 12;
      meridiem = "PM";
   } else {
      meridiem = "AM";
   }

   const m = today.getMinutes();

   h = checkTime(h);
   const formattedM = checkTime(m);

   document.getElementById("txt").innerHTML = `${h}:${formattedM} ${meridiem}`;

   const weekDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
   const allMonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

   const date = document.getElementById("date");
   const day = document.getElementById("day");
   const month = document.getElementById("month");
   const year = document.getElementById("year");

   date.innerHTML = (today.getDate() < 10 ? "0" : "") + today.getDate();
   day.innerHTML = weekDays[today.getDay()];
   month.innerHTML = allMonths[today.getMonth()];
   year.innerHTML = today.getFullYear();

   const t = setTimeout(function () {
      startTime();
   }, 1000);
}

function checkTime(i) {
   if (i < 10) {
      i = "0" + i;
   }
   return i;
}

//Selamat
const say = document.getElementById('say');

function getGreeting() {
   const currentTime = new Date().getHours();

   if (currentTime >= 0 && currentTime < 12) {
      return "Good Morning";
   } else if (currentTime >= 12 && currentTime < 18) {
      return "Good Afternoon";
   } else {
      return "Good Evening";
   }
}

const greeting = getGreeting();
say.textContent = greeting;

// range
const rangeInput = document.querySelector(".range");
const rangeValue = document.querySelector(".rangeValue");

rangeInput.addEventListener('input', () => {
   rangeValue.textContent = rangeInput.value + '%';
});

// moon/day
document.addEventListener("DOMContentLoaded", function () {
   const card2Element = document.querySelector(".container2");
   const dayElement = card2Element.querySelector("#day");
   const nightElement = card2Element.querySelector("#night");

   const currentTime = new Date().getHours();

   if (currentTime >= 18 || currentTime < 6) {
      dayElement.style.display = "none";
      nightElement.style.display = "block";
   } else {
      dayElement.style.display = "block";
      nightElement.style.display = "none";
   }
});

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
// const recentCustomers = document.querySelector('.recentCustomers');
// const circle = document.querySelector('.circle');
// const input = document.querySelector('input[type="text"]');
// const textAreas = document.querySelectorAll('textarea');
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
         td.style.borderBottom = '2px solid var(--white)';
      });
      // recentCustomers.classList.add('night-mode-card');
      // circle.style.backgroundColor = 'var(--black1)';
      // input.style.outline = '2px solid var(--white)';
      // input.style.backgroundColor = 'var(--black1)';
      // input.style.color = 'var(--white)';
      // textAreas.forEach(function (textArea) {
      //    textArea.style.border = '2px solid var(--white)';
      //    textArea.style.backgroundColor = 'var(--black1)';
      //    textArea.style.color = 'var(--white)';
      // });
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
         td.style.borderBottom = '2px solid var(--black1)';
      });
      // recentCustomers.classList.remove('night-mode-card');
      // circle.style.backgroundColor = 'var(--white)';
      // input.style.outline = '2px solid var(--black3)';
      // input.style.backgroundColor = 'var(--white)';
      // input.style.color = 'var(--black1)';
      // textAreas.forEach(function (textArea) {
      //    textArea.style.outline = '2px solid var(--black3)';
      //    textArea.style.backgroundColor = 'var(--white)';
      //    textArea.style.color = 'var(--black1)';
      // });
      dayElement.style.display = "block";
      nightElement.style.display = "none";
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