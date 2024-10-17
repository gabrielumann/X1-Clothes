let createModal = document.getElementById('createModal');
let btnOpenCreateModal = document.getElementById('btn-open-create-modal');
let closeCreateModalBtn = document.querySelector('.close-create-modal');

btnOpenCreateModal.onclick = function() {
    createModal.style.display = "block";
}

closeCreateModalBtn.onclick = function() {
    createModal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === createModal) {
        createModal.style.display = "none";
    }
}
