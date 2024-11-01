import {getBackendUrl, getBackendUrlApi, showToast} from "../../../shared/js/functions.js";
import {session} from "../../../shared/js/globals.js";


if(session === null) {
    setTimeout(() => {
        window.location.href = getBackendUrl("entrar");
    },1);
}

window.addEventListener("load", async (e) => {
    let response = await (await fetch(getBackendUrlApi("users/token-validate"), {
        method: "GET",
        headers: {
            "token": "Bearer " + session.token
        }
    })).json();
    console.log(response);

    if(response.type === "error") {
        setTimeout(() => {
            window.location.href = getBackendUrl("entrar");
        },1);
    }

});

