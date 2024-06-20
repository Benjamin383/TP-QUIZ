let temps = 30;
const timerElement = document.getElementById("timer");

function diminuerTemps() {
  let secondes = parseInt(temps % 60, 10);

  secondes = secondes < 10 ? "0" + secondes : secondes;

  timerElement.innerText = secondes;
  temps = temps <= 0 ? 0 : temps - 1;
}

setInterval(diminuerTemps, 1000);
