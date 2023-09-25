const searchInput = document.getElementById('searchInput');
const itemList = document.getElementById('itemList');
const dropdownContent = document.querySelector('.dropdown-content');

searchInput.addEventListener('input', () => {
   const searchText = searchInput.value.toLowerCase();
   const items = itemList.getElementsByTagName('li');

   for (let i = 0; i < items.length; i++) {
      const item = items[i];
      const itemText = item.textContent.toLowerCase();

      if (itemText.includes(searchText)) {
         item.style.display = 'block';
      } else {
         item.style.display = 'none';
      }
   }

   if (searchText.length > 0) {
      dropdownContent.classList.add('show');
   } else {
      dropdownContent.classList.remove('show');
   }
});

// Show dropdown on input click
searchInput.addEventListener('click', (e) => {
   e.stopPropagation();
   dropdownContent.classList.toggle('show');
});

// Hide dropdown when clicking outside of it
document.addEventListener('click', (event) => {
   if (!event.target.matches('.dropbtn')) {
      dropdownContent.classList.remove('show');
   }
});

// Add click event listener to list items
const listItems = itemList.querySelectorAll('li');
listItems.forEach(item => {
   item.addEventListener('click', () => {
      searchInput.value = item.textContent;
      dropdownContent.classList.remove('show');
   });
});