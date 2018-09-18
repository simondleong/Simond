/* ******************************************** */
// ------------- PAYMENT MODAL --------------
/* ******************************************** */

// Get the modal
let x = document.getElementById('paymentModal');
let paymentModal = document.getElementById('paymentModal');
x.parentNode.removeChild(x);
document.body.insertBefore(paymentModal, document.body.childNodes[0]);

function showModal() {
    paymentModal.style.display = "block";
}

let closeButton = document.getElementsByClassName("closeModal")[0];

closeButton.onclick = function () {
    paymentModal.style.display = "none";
};

/* ******************************************** */
// ----------- END OF MODAL ---------------
/* ******************************************** */