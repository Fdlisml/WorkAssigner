// range
const rangeInput = document.querySelector(".range");
const rangeValue = document.querySelector(".rangeValue");

rangeInput.addEventListener('input', () => {
    rangeValue.textContent = rangeInput.value + '%';
});