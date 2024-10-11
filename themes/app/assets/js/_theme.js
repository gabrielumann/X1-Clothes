import {getBackendUrl, getBackendUrlApi, showToast} from "../../../shared/js/functions.js";
import {session} from "../../../shared/js/globals.js";

window.addEventListener("load", async (e) => {
    let response = await (await fetch(getBackendUrlApi("users/token-validate"), {
        method: "GET",
        headers: {
            "token": "Bearer " + session
        }
    })).json();
    console.log(response);

    if(response.type === "error") {
        setTimeout(() => {
            window.location.href = getBackendUrl("entrar");
        },1);
    }
});

