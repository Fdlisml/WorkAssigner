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

    const weekDays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const allMonths = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

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