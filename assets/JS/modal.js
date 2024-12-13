'use strict';

document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("modal");
    var openButton = document.getElementById("open-modal");
    var closeButton = document.getElementsByClassName("close")[0];

    openButton.onclick = function () {
        modal.style.display = "block";
    };

    closeButton.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});