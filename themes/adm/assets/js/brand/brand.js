import {getList,
} from "../../../../shared/js/functions.js"

let tbody = document.querySelector("tbody#brands-list")
window.addEventListener("load", async () => {
    tbody.innerHTML = ' ';
    let brands = await getList("/products/brands")
    //console.log(brands);
    brands.forEach((e) => {
        tbody.innerHTML += `
        <tr id="${e.id}">
            <td>${e.id}</td>
            <td>${e.name}</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
`
    })

})