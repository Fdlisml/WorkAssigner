const rangeInputs = document.querySelectorAll('.range');

const rangeValues = document.querySelectorAll('.rangeValue');

rangeInputs.forEach(function (input, index) {
   input.addEventListener('input', function () {
      rangeValues[index].textContent = `${this.value}%`;
   });
});