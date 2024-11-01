const btnOpenUpdateModal = document.getElementById('btn-open-update-modal')
const updateModal = document.getElementById('updateModal');
const closeUpdateModalBtn = document.querySelector('.close-update-modal');

const btnOpenPassword = document.getElementById('btn-open-password-modal')
const passwordModal = document.getElementById('passwordModal');
const closePasswordModalBtn = document.querySelector('.close-password-modal');

btnOpenUpdateModal.onclick = function() {
    updateModal.style.display = "block";
}

btnOpenPassword.onclick = function() {
    passwordModal.style.display = "block";
}

window.onclick = function(event) {
    if (event.target === updateModal) {
        updateModal.style.display = "none";
    } else{
        if (event.target === passwordModal){
            passwordModal.style.display = "none";
        }
    }
}

closeUpdateModalBtn.onclick = function() {
    updateModal.style.display = "none";
}

closePasswordModalBtn.onclick = function() {
    passwordModal.style.display = "none";
}