//  night mode
document.addEventListener("DOMContentLoaded", function () {
   const toggleBtn = document.getElementById('dn');
   const toggleHandler = document.querySelector('.toggle__handler');
   const stars = document.querySelectorAll('.star');
   const craters = document.querySelectorAll('.crater');
   const secMain = document.querySelector('.secMain')
   const card1 = document.querySelector('.card1');
   const card2 = document.querySelector('.card2');
   const recentOrders = document.querySelector('.recentOrders');
   const table = document.querySelector('table');
   const tds = document.querySelectorAll('.details table tbody td');
   const ths = document.querySelectorAll('.details table thead th');
   const recentCustomers = document.querySelector('.recentCustomers');
   const circle = document.querySelector('.circle');
   const inputs = document.querySelectorAll('input[type="text"]');
   const textAreas = document.querySelectorAll('textarea');
   const labels = document.getElementsByTagName('label');
   var tableInfo = document.querySelector('table_info');
   console.log("tableInfo:", tableInfo);

   const nightModeEnabled = parseInt(localStorage.getItem('toggle'));

   function toggleNightMode(enabled) {
      if (enabled) {
         toggleBtn.checked = true;
         for (let i = 0; i < labels.length; i++) {
            labels[i].style.color = 'var(--white)';
         }
         [recentOrders, recentCustomers, card1, card2].forEach(element => (element) ? element.classList.add('night-mode-card') : '');
         [...stars, ...craters, secMain, toggleHandler].forEach(element => element.classList.add('night-mode'));
         table.style.borderTop = '2px solid var(--white)';
         tds.forEach(td => {
            td.style.borderColor = 'var(--white)';
            td.style.backgroundColor = 'var(--black1)';
         });
         ths.forEach(th => th.style.borderColor = 'var(--white)');
         (circle) ? circle.style.backgroundColor = 'var(--black1)' : '';
         inputs.forEach(input => {
            input.style.border = '2px solid var(--white)';
            input.style.backgroundColor = 'var(--black1)';
            input.style.color = 'var(--white)';
         });
         textAreas.forEach(textArea => {
            textArea.style.border = '2px solid var(--white)';
            textArea.style.backgroundColor = 'var(--black1)';
            textArea.style.color = 'var(--white)';
         });
         if (tableInfo) {
            tableInfo.style.setProperty('color', 'white');
         }
      } else {
         toggleBtn.checked = false;
         for (let i = 0; i < labels.length; i++) {
            labels[i].style.color = 'var(--black1)';
         }
         [recentOrders, recentCustomers, toggleHandler, card1, card2].forEach(element => (element) ? element.classList.remove('night-mode-card') : '');
         [...stars, ...craters, secMain, toggleHandler].forEach(element => element.classList.remove('night-mode'));
         table.style.borderTop = '2px solid var(--black1)';
         tds.forEach(td => {
            td.style.borderColor = 'var(--black1)';
            td.style.backgroundColor = 'var(--white)';
         });
         ths.forEach(th => th.style.borderColor = 'var(--black1)');
         (circle) ? circle.style.backgroundColor = 'var(--white)' : '';
         inputs.forEach(input => {
            input.style.border = '2px solid var(--black3)';
            input.style.backgroundColor = 'var(--white)';
            input.style.color = 'var(--black1)';
         });
         textAreas.forEach(textArea => {
            textArea.style.border = '2px solid var(--black3)';
            textArea.style.backgroundColor = 'var(--white)';
            textArea.style.color = 'var(--black1)';
         });
         if (tableInfo) {
            tableInfo.style.setProperty('color', 'white');
         }
      }
   };

   toggleBtn.addEventListener('change', function () {
      const isEnabled = this.checked;
      localStorage.setItem('toggle', (isEnabled) ? 1 : 0);
      toggleNightMode(isEnabled);
   });
   toggleNightMode(nightModeEnabled);

});