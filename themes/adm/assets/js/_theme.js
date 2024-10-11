import {getBackendUrl, getBackendUrlApi} from "../../../shared/js/functions.js";
import {session} from "../../../shared/js/globals.js";

window.addEventListener("load", async (e) => {
    let response = await (await fetch(getBackendUrlApi("users/adm-permission-validate"), {
        method: "GET",
        headers: {
            "token": "Bearer " + session
        }
    })).json();
    //console.log(response);
    if(response.type !== "success") {
        window.location.href = getBackendUrl("app");
    }
});
