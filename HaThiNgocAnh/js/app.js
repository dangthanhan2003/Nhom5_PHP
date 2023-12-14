const modalDetail = document.querySelector('#modal-detail');
const modalItem = document.querySelector('#modal-item');
const btnClose = document.querySelector('#btn-close');


function preventLink(event) {
    event.preventDefault();
    showModal();
}

function showModal() {
    modalDetail.classList.add('open-modal');
}

function hideModal() {
    modalDetail.classList.remove('open-modal');
}

modalDetail.addEventListener('click', hideModal);
btnClose.addEventListener('click', hideModal);
modalItem.addEventListener('click', (event) => {
    event.stopPropagation();
});
	
function validateDiscount(input) {
    if (input.value < 0) {
        input.value = 0;
    }

    if (input.value > 1000) {
        input.value = 1000; 
    }
}




