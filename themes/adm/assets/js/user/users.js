import {RequestUser} from "../../../../shared/js/classes/RequestUser.js";

let tbody = document.querySelector("tbody#user-list")
const apiUser = new RequestUser()
window.addEventListener("load", async () => {
    tbody.innerHTML = ' ';
    let {data: users} = await apiUser.listUsers()
    users.forEach((e) => {
        tbody.innerHTML += `
        <tr id="${e.id}">
            <td>${e.id}</td>
            <td>${e.first_name + ' ' + e.last_name}</td>
            <td>${e.email}</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="edit-image-btn">Editar Imagem</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
`
    })

})
const updateImageModal = document.getElementById('updateImageModal');
const closeUpdateImageModalBtn = document.querySelector('.close-update-image-modal');
