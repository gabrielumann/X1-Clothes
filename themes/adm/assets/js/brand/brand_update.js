import {
    clearForm , destroy, formAppendImages,
    getBackendUrlApi,
    getList,
    showDataForm,
    showToast
} from "../../../../shared/js/functions.js"
let tbody = document.querySelector("tbody#brands-list")

const POSITION = 1;
let brandID;
const updateModal = document.getElementById('updateModal');
tbody.addEventListener("click", async (e) => {
    if(e.target.matches("button.edit-btn")){
        brandID = e.target.parentElement.parentElement.getAttribute("id")
        clearForm(['name'])
        let getBrandID = await getList(`/products/brands/${brandID}`)
        getBrandID.forEach((e) => {
            updateModal.style.display = "block";
            showDataForm(e, 1);
        })
    }
    if(e.target.matches("button.delete-btn")){
        brandID = e.target.parentElement.parentElement.getAttribute("id")
        let DeleteBrandID = await destroy(`/products/brands/delete/${brandID}`)
        showToast(DeleteBrandID.message).then(() => {
            window.location.reload();
        })
    }
});

const updateBrand = document.getElementById("form-update")
updateBrand.addEventListener("submit", async (e) => {
    e.preventDefault();

    let response = await (await fetch(getBackendUrlApi(`/products/brands/update/${brandID}`), {
        method: "POST",
        body: new FormData(updateBrand)

    })).json();
    showToast(response.message).then(() => {
        window.location.reload();
    })

});

