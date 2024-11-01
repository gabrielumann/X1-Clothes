import {
    getList, setAllOptions,
} from "../../../../shared/js/functions.js"
let ImagesLocalPath = '/X1-Clothes/storage/images/products/';

let tbody = document.querySelector("tbody#products-list")
window.addEventListener("load", async () => {
    let products = await getList("/products")
    products.forEach((e) => {
        function createTable(e) {
            const line = document.createElement("tr");
            line.id = e.id;

            const tdId = document.createElement("td");
            tdId.textContent = e.id;
            line.appendChild(tdId);

            const tdImage = document.createElement("td");
            const img = document.createElement("img");
            img.src = "../" + e.product_image[0].image || "";
            img.alt = "Imagem do Produto";
            img.className = "product-img";
            tdImage.appendChild(img);
            line.appendChild(tdImage);

            const tdName = document.createElement("td");
            tdName.textContent = e.name;
            line.appendChild(tdName);

            const tdPrice = document.createElement("td");
            tdPrice.textContent = `R$ ${e.price_brl || ""}`;
            line.appendChild(tdPrice);

            const tdActions = document.createElement("td");
            const btnEdit = document.createElement("button");
            btnEdit.textContent = "Editar";
            btnEdit.className = "edit-btn";
            tdActions.appendChild(btnEdit);

            const btnDestroy = document.createElement("button");
            btnDestroy.textContent = "Excluir";
            btnDestroy.className = "delete-btn";
            tdActions.appendChild(btnDestroy);

            // Adiciona o <td> com os botões à linha
            linha.appendChild(tdAcoes);

            return linha;
        }

        tbody.innerHTML = `
            <tr id="${e.id}">
                <td>${e.id}</td>
                <td><img src="${e.product_image[0].image}" alt="Imagem do Produto" class="product-img"></td> <!-- Exemplo de imagem -->
                <td>${e.name}</td>
                <td>R$ ${e.price_brl.toFixed(2).toString().replace(".", ",")}</td>
                <td>
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Excluir</button>
                </td>
            </tr>`
    })

    await setAllOptions("/products/category", "#category");
    await setAllOptions("/products/sizes", "#size");
    await setAllOptions("/products/brands", "#brand");

})
let pimg = document.querySelectorAll(".product-img")
console.log(pimg[0])