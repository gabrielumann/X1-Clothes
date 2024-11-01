const createModal = document.getElementById('createModal');
const btnOpenCreateModal = document.getElementById('btn-open-create-modal');
const closeCreateModalBtn = document.querySelector('.close-create-modal');

const updateModal = document.getElementById('updateModal');
const closeUpdateModalBtn = document.querySelector('.close-update-modal');

const updateImageModal = document.getElementById('updateImageModal') != null ? document.getElementById('updateImageModal'): updateModal;
const closeUpdateImageModalBtn = document.querySelector('.close-update-image-modal') != null ? document.querySelector('.close-update-image-modal'): closeUpdateModalBtn;

btnOpenCreateModal.onclick = function() {
    createModal.style.display = "block";
}


window.onclick = function(event) {
    if (event.target === createModal) {
        createModal.style.display = "none";
    } else if (event.target === updateModal){
        updateModal.style.display = "none";
        }else if(event.target === updateImageModal){
        updateImageModal.style.display = "none";
    }
}
closeCreateModalBtn.onclick = function() {
    createModal.style.display = "none";
}

closeUpdateModalBtn.onclick = function() {
    updateModal.style.display = "none";
}

closeUpdateImageModalBtn.onclick = function() {
    updateImageModal.style.display = "none";
}