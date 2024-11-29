import {session} from "../../../shared/js/globals.js";

import {RequestUser} from "../../../shared/js/classes/RequestUser.js";

const apiUser = new RequestUser()
async function renderProfileImage(){
    const allProfileImagesFields = document.querySelectorAll(".profile-image")
    let {data: users} = await apiUser.getUserById(session.id)
    let imageSrc = users[0].image != null? users[0].image: 'themes/shared/images/interface/user-base-icon.jfif'

    allProfileImagesFields.forEach((e, i) => {
        e.src = "../" + imageSrc
       // console.log(e.src)
    })
}
await renderProfileImage();