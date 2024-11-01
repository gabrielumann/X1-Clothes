import {getBackendUrl, getBackendUrlApi} from "../../../shared/js/functions.js";
import {session} from "../../../shared/js/globals.js";
if(session === null) {
    window.location.href = getBackendUrl("entrar");
}
window.addEventListener("load", async (e) => {
    let response = await (await fetch(getBackendUrlApi("users/adm-permission-validate"), {
        method: "GET",
        headers: {
            "token": "Bearer " + session.token
        }
    })).json();
    //console.log(response);
    if(response.type !== "success") {
        window.location.href = getBackendUrl("app");
    }
});
