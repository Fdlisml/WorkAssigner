//Selamat
const say = document.getElementById('say');

function getGreeting() {
    const currentTime = new Date().getHours();

    if (currentTime >= 0 && currentTime < 12) {
        return "Selamat Pagi";
    } else if (currentTime >= 12 && currentTime < 18) {
        return "Selamat Sore";
    } else {
        return "Selamat Malam";
    }
}

const greeting = getGreeting();
say.textContent = greeting;