var password = document.getElementById('fakePassword');
var toggler = document.getElementById('toggler');

showHidePassword = () => {
   if (password.type == 'password') {
      password.setAttribute('type', 'text');
      toggler.setAttribute('name', 'eye-outline');
   } else {
      toggler.classList.remove('eye-off-outline');
      password.setAttribute('type', 'password');
   }
};

toggler.addEventListener('click', showHidePassword);

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