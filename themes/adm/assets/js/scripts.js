let btnOpenModal = document.querySelector("button.add-btn")

btnOpenModal.onclick = function() {
    document.getElementById('myModal').style.display = "block";
}

// Fecha a modal
document.querySelector('.close-btn').onclick = function() {
    document.getElementById('myModal').style.display = "none";
}

// Fecha a modal se o usuário clicar fora dela
window.onclick = function(event) {
    if (event.target == document.getElementById('myModal')) {
        document.getElementById('myModal').style.display = "none";
    }
}
