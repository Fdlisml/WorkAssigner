// Modal box
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btns = document.querySelectorAll("#myBtn");
var inputIdTugas = document.querySelector('input[name="id_tugas"]')

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btns.forEach(function (btn) {
    btn.onclick = function (e) {
        modal.style.display = "block";
        // console.log(e.target.dataset.id);
        var idTugas = e.target.dataset.id;
        inputIdTugas.value = idTugas;
    }
});

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
