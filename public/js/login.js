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