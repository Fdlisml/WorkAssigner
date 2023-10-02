// Loader functions
function showLoader() {
   document.querySelector('.container-loader').style.display = 'block';
}

function hideLoader() {
   document.querySelector('.container-loader').style.display = 'none';
}

window.addEventListener('beforeunload', () => {
   showLoader();
});