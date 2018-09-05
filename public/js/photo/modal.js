/* ******************************************** */
// ------------- PHOTO MODAL --------------
/* ******************************************** */

// Get the modal
let a = document.getElementById('imageModal');
let modal = document.getElementById('imageModal');
a.parentNode.removeChild(a);
document.body.insertBefore(modal, document.body.childNodes[0]);

function showImage(element , i) {

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    let img = document.getElementById(i);
    let modalImg = document.getElementById("modal-img");

    modal.style.display = "block";
    modalImg.src = element.src;
}

let span = document.getElementsByClassName("close")[0];

span.onclick = function () {
    modal.style.display = "none";
};

/* ******************************************** */
// ----------- END OF MODAL ---------------
/* ******************************************** */