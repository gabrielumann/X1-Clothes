import {
    destroy,
    getBackendUrlApi,
    getList,
    showDataForm,
    showToast
} from "../../../../shared/js/functions.js"
let tbody = document.querySelector("tbody#user-list")
let userID;
const updateImageModal = document.getElementById('updateImageModal');
const updateModal = document.getElementById('updateModal');
tbody.addEventListener("click", async (e) => {
    if(e.target.matches("button.edit-btn")){
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let getUserID= await getList(`/users/${userID}`)
        getUserID.forEach((e) => {
            updateModal.style.display = "block";
            showDataForm(e, 1);
        })
    }
    if(e.target.matches("button.edit-image-btn")){
        //console.log(e.target.parentElement.parentElement.getAttribute("id"))
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let mainImage = document.querySelector('#current-main-image')
        // tem que fazer isso
        // dar um gitpull e mudar o tipo da imagem pra ffile
        let getUserID= await getList(`/users/${userID}`)
        updateImageModal.style.display = "block";
        getUserID.forEach((e) => {
            let userImg = e.image != null ? e.image: 'themes/shared/images/interface/user-base-icon.jfif'
            mainImage.src = '../' + userImg;
        })
    }
    if(e.target.matches("button.delete-btn")){
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let DeleteUserID = await destroy(`/users/delete/${userID}`)
        showToast(DeleteUserID.message).then(() => {
            window.location.reload();
        })
    }
});

const updateUser = document.getElementById("form-update")
updateUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await (await fetch(getBackendUrlApi(`/users/update/${userID}`), {
        method: "POST",
        body: new FormData(updateUser)
    })).json();
    console.log(response);
    showToast(response.message).then(() => {
        window.location.reload();
    })
});

const updateUserImage = document.getElementById("form-update-image")
const inputImage = document.getElementById('user-new-image');
updateUserImage.addEventListener("submit", async (e) => {
    e.preventDefault();
    if(inputImage && inputImage.files.length > 0) {

        let formData = new FormData()
        formData.append('image' , inputImage.files[0])
        let response = await (await fetch(getBackendUrlApi(`/users/update/image/${userID}`), {
            method: "POST",
            body: formData
        })).json();
        console.log(response);
        showToast(response.message).then(() => {
            window.location.reload();
        })
    }else{
        showToast('Deve ser enviado um valor para o campo imagem').then()
    }
});

