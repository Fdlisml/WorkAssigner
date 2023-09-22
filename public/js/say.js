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