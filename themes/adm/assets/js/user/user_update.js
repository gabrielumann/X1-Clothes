import {
    destroy,
    getBackendUrlApi,
    getList,
    showDataForm,
    showToast
} from "../../../../shared/js/functions.js"
let tbody = document.querySelector("tbody#user-list")
let userID;
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

