import {session} from "../../../shared/js/globals.js";
import {getList} from "../../../shared/js/functions.js";

async function renderProfileImage(){
    const allProfileImagesFields = document.querySelectorAll(".profile-image")
    let users = await getList(`/users/${session.id}`)
    let imageSrc = users[0].image != null? users[0].image: 'themes/shared/images/interface/user-base-icon.jfif'

    allProfileImagesFields.forEach((e, i) => {
        e.src = "../" + imageSrc
        console.log(e.src)
    })
}
await renderProfileImage();