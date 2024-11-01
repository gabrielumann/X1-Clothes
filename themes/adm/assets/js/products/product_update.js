import {
    clearForm,
     destroy,
    formAppendImages,
    getBackendUrlApi,
    getList,
    showDataForm,
    showToast
} from "../../../../shared/js/functions.js"
let tbody = document.querySelector("tbody#products-list")
let ImagesLocalPath = '/X1-Clothes/';
let productID;
const updateModal = document.getElementById('updateModal');
const closeUpdateModalBtn = document.querySelector('.close-update-modal');
tbody.addEventListener("click", async (e) => {
    if(e.target.matches("button.edit-btn")){
        productID = e.target.parentElement.parentElement.getAttribute("id")
        clearForm(['name', 'price_brl', 'color', 'category', 'size', 'brand'])
        clearImages(['current-main-image', 'current-comp-image-1', 'current-comp-image-2', 'current-comp-image-3', 'current-comp-image-4'])

        let getProductID = await getList(`/products/${productID}`)
        getProductID.forEach((e) => {
            updateModal.style.display = "block";
            showDataForm(e, 1);
            if(e.product_image instanceof Array){
                ShowImagesForm(e.product_image)
            }
        })
    }
    if(e.target.matches("button.delete-btn")){
        productID = e.target.parentElement.parentElement.getAttribute("id")
        let DeleteProductID = await destroy(`/products/delete/${productID}`)
        //console.log(DeleteProductID)
        showToast(DeleteProductID.message).then(() => {
            window.location.reload();
        })
    }
});
function ShowImagesForm(arrayImg) {
    arrayImg.forEach((e, i ) => {
        if(e.type === "PRINCIPAL"){
            document.querySelector("#current-main-image").src = ImagesLocalPath + e.image
        }else {
            document.querySelector(`#current-comp-image-${i}`).src = ImagesLocalPath + e.image
        }
    })
}
function clearImages(arrayImgId, fieldPosition = 0) {
    arrayImgId.forEach(field => {
        if (document.querySelectorAll(`#${field}`)[fieldPosition].tagName === 'IMG') {
            document.querySelectorAll(`#${field}`)[fieldPosition].src = ' ';
        }

    });
}
//
// update product
//
const updateProductForm = document.getElementById("form-update-product")
updateProductForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let principal_images =  document.querySelector("#new-product-image")
    let comp_images = [
        document.querySelector("#new-comp-image-1"),
        document.querySelector("#new-comp-image-2"),
        document.querySelector("#new-comp-image-3"),
        document.querySelector("#new-comp-image-4"),
    ]
    let Form = new FormData(updateProductForm)
    Form = formAppendImages(Form, principal_images, comp_images)
    let response = await (await fetch(getBackendUrlApi(`/products/update/${productID}`), {
        method: "POST",
        body: Form

    })).json();
    showToast(response.message).then(() => {
        window.location.reload();
    })
});

