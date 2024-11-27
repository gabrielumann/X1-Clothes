import {
    getBackendUrlApi,
    showDataForm,
    showToast
} from "../../../../shared/js/functions.js"
import {RequestUser} from "../../../../shared/js/classes/RequestUser.js";

const apiUser = new RequestUser()
let tbody = document.querySelector("tbody#user-list")
let userID;
const updateImageModal = document.getElementById('updateImageModal');
const updateModal = document.getElementById('updateModal');
tbody.addEventListener("click", async (e) => {
    if(e.target.matches("button.edit-btn")){
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let {data: UserById} = await apiUser.getUserById(userID)
        UserById.forEach((e) => {
            updateModal.style.display = "block";
            showDataForm(e, 1);
        })
    }
    if(e.target.matches("button.edit-image-btn")){
        //console.log(e.target.parentElement.parentElement.getAttribute("id"))
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let mainImage = document.querySelector('#current-main-image')
        let {data: UserById}= await apiUser.getUserById(userID)
        updateImageModal.style.display = "block";
        UserById.forEach((e) => {
            let userImg = e.image != null ? e.image: 'themes/shared/images/interface/user-base-icon.jfif'
            mainImage.src = '../' + userImg;
        })
    }
    if(e.target.matches("button.delete-btn")){
        userID = e.target.parentElement.parentElement.getAttribute("id")
        let DeleteUserID = await apiUser.deleteUser(userID)
        showToast(DeleteUserID.message).then(() => {
            window.location.reload();
        })
    }
});

const updateUser = document.getElementById("form-update")
updateUser.addEventListener("submit", async (e) => {
    e.preventDefault();
    let response = await apiUser.updateUser(new FormData(updateUser), userID)
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
        try {
            let formData = new FormData()
            formData.append('image' , inputImage.files[0])
            let response = await apiUser.updateUserImage(formData, userID)
            console.log(response)
            showToast(response.message).then(() => {
                window.location.reload();
            })
        }catch (e){
            console.log(e)
        }

    }else{
        showToast('Deve ser enviado um valor para o campo imagem').then()
    }
});

