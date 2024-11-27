import {RequestProduct} from "../../../shared/js/classes/RequestProduct.js";
import {ImagesLocalPath} from "../../../shared/js/globals.js";

const apiProduct = new RequestProduct()
let smallContainer = document.querySelector("div.small-container")

let {data: products} = await apiProduct.listProducts()
if (Array.isArray(products)){
    let currentRow = null;
    products.forEach((product, index) => {
        if (index % 4 === 0){
            currentRow = document.createElement('div');
            currentRow.className = 'row';
            smallContainer.appendChild(currentRow);
        }

        let principalImage = null;
        if(product.product_image && typeof product.product_image !== "string") {
            (product.product_image).forEach((e) => {
                if(e.type === 'PRINCIPAL') {
                    principalImage = e.image
                }
            })
        }

        currentRow.innerHTML += `
            <div class="col-4" id="${product.id}">
                <a href="detalhes">
                    <img src="${ImagesLocalPath + principalImage}">
                </a>

                <a href="detalhes">
                    <h4>${product.name}</h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>${product.price_brl.toFixed(2).toString().replace(".", ",")}</p>
            </div>`
    })
}