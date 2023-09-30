document.addEventListener('DOMContentLoaded', function() {
   var statusDivs = document.querySelectorAll('.status #status-div');

   statusDivs.forEach(function(statusDiv) {
       var statusValue = parseInt(statusDiv.innerText);
       statusDiv.innerText = '';
       switch (statusValue) {
           case 1:
               statusDiv.style.backgroundColor = '#ff0019';
               break;
           case 2:
               statusDiv.style.backgroundColor = '#fcbd00';
               break;
           case 3:
               statusDiv.style.backgroundColor = '#11d87b';
               break;
           default:
               break;
       }
   });
});