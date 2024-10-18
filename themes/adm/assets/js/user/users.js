import {getList,
} from "../../../../shared/js/functions.js"

let tbody = document.querySelector("tbody#user-list")
window.addEventListener("load", async () => {
    tbody.innerHTML = ' ';
    let users = await getList("/users")
    //console.log(users);
    users.forEach((e) => {
        tbody.innerHTML += `
        <tr id="${e.id}">
            <td>${e.id}</td>
            <td>${e.first_name + ' ' + e.last_name}</td>
            <td>${e.email}</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
`
    })

})