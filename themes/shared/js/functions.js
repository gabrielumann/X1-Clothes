import RequestBase from "./classes/RequestBase.js";

export const URLpath = "X1-Clothes";

const api = new RequestBase(`${location.protocol}//${location.hostname}/${URLpath}/api`);

export function getBackendUrl(path = "") {
    return `${location.protocol}//${location.hostname}/${URLpath}/${path}`;
}

export function verifyIsArray(element){
    if (Array.isArray(element)) {
        return element
    }else{
        let array = []
        array.push(element)
        return array
    }
}
// Função para retornar a URL da API
export function getBackendUrlApi(path = "") {
    return `${location.protocol}//${location.hostname}/${URLpath}/api/${path}`;
}


// Função para preencher os campos do formulário com os dados do objeto
export function showDataForm (object, fieldPosition = 1)  {
    for(const field in object){
        let htmlElement = document.querySelectorAll("#"+field)[fieldPosition];
        if (htmlElement){
            htmlElement.value = object[field];

        }
    }
}

// Função para exibir mensagens toast
export function showToast (message) {
    return new Promise((resolve) => {
        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        toastContainer.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('show');
        }, 100);

        setTimeout(() => {
            toast.classList.remove('show');
            toast.classList.add('hide');
            setTimeout(() => {
                toastContainer.removeChild(toast);
                resolve();
            }, 500);
        }, 1000);
    })
}
export async function destroy ($path) {
    return await (await fetch(getBackendUrlApi($path), {method: "DELETE"})).json();
}

export async function setAllOptions($path, $htmlElement) {
    let field = document.querySelectorAll($htmlElement);
    let {data: arr} = await api.get($path)
    //console.log(field);
    field.forEach((htmlElement) => {
        arr.forEach((e) => {
            htmlElement.innerHTML += `<option value="${e.id}">${e.name}</option>`
        })
    })
}
export function clearForm(arrayElementId, fieldPosition = 1) {
    arrayElementId.forEach(field => {
        //console.log(document.querySelectorAll(`#${field}`)[fieldPosition])
        document.querySelectorAll(`#${field}`)[fieldPosition].value = ' ';
    });
}
export function formAppendImages(FormDATA, principal_image, comp_images){
    if(isFileInputFilled(principal_image)) FormDATA.append("principal_image", principal_image.files[0])
    if(isFileInputFilled(comp_images[0])) FormDATA.append("additional_image_1", comp_images[0].files[0])
    if(isFileInputFilled(comp_images[1])) FormDATA.append("additional_image_2", comp_images[1].files[0])
    if(isFileInputFilled(comp_images[2])) FormDATA.append("additional_image_3", comp_images[2].files[0])
    if(isFileInputFilled(comp_images[3])) FormDATA.append("additional_image_4", comp_images[3].files[0])

    return FormDATA
}
function isFileInputFilled(inputElement) {
    return inputElement && inputElement.files && inputElement.files.length > 0;
}