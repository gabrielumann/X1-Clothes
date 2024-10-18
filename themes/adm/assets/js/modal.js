const createModal = document.getElementById('createModal');
const btnOpenCreateModal = document.getElementById('btn-open-create-modal');
const closeCreateModalBtn = document.querySelector('.close-create-modal');

const updateModal = document.getElementById('updateModal');
const closeUpdateModalBtn = document.querySelector('.close-update-modal');

btnOpenCreateModal.onclick = function() {
    createModal.style.display = "block";
}

closeCreateModalBtn.onclick = function() {
    createModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === createModal) {
        createModal.style.display = "none";
    } else{
    if (event.target === updateModal){
        updateModal.style.display = "none";
        }
    }

}

closeUpdateModalBtn.onclick = function() {
    updateModal.style.display = "none";
}