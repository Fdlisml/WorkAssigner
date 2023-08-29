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


// range
const rangeInputs = document.querySelectorAll('.range');
rangeInputs.forEach(rangeInput => {
  const rangeValue = rangeInput.parentElement.nextElementSibling.querySelector('.rangeValue');
  rangeInput.addEventListener('input', () => {
    rangeValue.textContent = rangeInput.value + '%';
  });
});