import {getBackendUrl, getBackendUrlApi, getList, setOption, showToast} from "../../../shared/js/functions.js";
window.addEventListener("load", async () => {
    document.querySelector("tbody.products").innerHTML = ' ';
    let products = await getList("/products")
    products.forEach((e) => {
        //console.log(e.product_image[0].image)

        document.querySelector("tbody.products").innerHTML += `
            <tr>
                <td>${e.id}</td>
                <td><img src="${e.product_image[0].image}" alt="Imagem do Produto" class="produto-img"></td> <!-- Exemplo de imagem -->
                <td>${e.name}</td>
                <td>R$ ${e.price_brl.toFixed(2).toString().replace(".", ",")}</td>
                <td>
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Excluir</button>
                </td>
            </tr>`
    })

    await setOption("/products/category", document.querySelector("#category"));
    await setOption("/products/sizes", document.querySelector("#size"));
    await setOption("/products/brands", document.querySelector("#brand"));
})
const inputElement = document.getElementById('product-complementary-images');
inputElement.addEventListener('change', function () {
    if (this.files.length > 4) {
        showToast("Você pode selecionar no máximo 4 imagens.");
        this.value = '';
    }
});



const productForm = document.querySelector("#form-register");
productForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!validateForm()) {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return;
    }

    let response = await (await fetch(getBackendUrlApi("/products"), {
        method: "POST",
        body: new FormData(productForm)
    })).json();
    console.log(response)

});
function validateForm() {
    const name = document.querySelector("#name").value.trim();
    const price = document.querySelector("#price_brl").value.trim();
    const color = document.querySelector("#color").value.trim();
    const category = document.querySelector("#category").value;
    const size = document.querySelector("#size").value;
    const brand = document.querySelector("#brand").value;
    const productImage = document.querySelector("#product-image").files.length;


    if (!name || !price || !color || !category || !size || !brand || productImage === 0) {
        return false;
    }

    return true;
}

