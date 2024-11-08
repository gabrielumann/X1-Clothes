import {showToast, getBackendUrlApi, getList} from "../../../shared/js/functions.js";
import {session} from "../../../shared/js/globals.js";

async function renderUserInfo(){
    let users = await getList(`/users/${session.id}`)
    let user = users[0]
    document.getElementById('firstName').innerText = user.first_name;
    document.getElementById('lastName').innerText = user.last_name;
    document.getElementById('email').innerText = user.email;
    document.getElementById('cpf').innerText = user.cpf;
    document.getElementById('input-first_name').value = user.first_name;
    document.getElementById('input-last_name').value = user.last_name;
    document.getElementById('input-email').value = user.email;
    document.getElementById('input-cpf').value = user.cpf;
}
await renderUserInfo();



const togglePasswordButtons = document.querySelectorAll('.toggle-password');
togglePasswordButtons.forEach(button => {
    button.addEventListener('click', () => {
        const passwordInput = button.previousElementSibling;

        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        button.textContent = type === 'password' ? '👁️' : '🙈';
    });
});
const inputImage = document.getElementById('user-new-image');
let userForm = document.querySelector('#form-update-user')
userForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let userImg = document.querySelector('#user-new-image')
    await handleImage(userImg);
    let response = await (await fetch(getBackendUrlApi(`/users/update/${session.id}`), {
        method: "POST",
        body: new FormData(userForm)
    })).json();
    showToast(response.message).then(() => {
        window.location.reload()
    })
});


async function handleImage (userImg){
try{
    if (userImg && userImg.files.length > 0) {
        let formData = new FormData()
        formData.append('image' , inputImage.files[0])
        let response = await (await fetch(getBackendUrlApi(`/users/update/image/${session.id}`), {
            method: "POST",
            body: formData
        })).json();
        console.log(response);
    } else{
        //TRAIQUÉTI CALABOKA
    }
}catch (e){

}
}
