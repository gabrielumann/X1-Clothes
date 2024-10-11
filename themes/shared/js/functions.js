export const URLpath = "X1-Clothes";
// export const URLpath = "sua-pasta-de-trabalho";

// Função para retornar a URL do backend
export function getBackendUrl(path = "") {
    return `${location.protocol}//${location.hostname}/${URLpath}/${path}`;
}


// Função para retornar a URL da API
export function getBackendUrlApi(path = "") {
    return `${location.protocol}//${location.hostname}/${URLpath}/api/${path}`;
}


// Função para preencher os campos do formulário com os dados do objeto
export function showDataForm (object)  {
    for(const field in object){
        if (document.querySelector("#"+field)){
            document.querySelector("#"+field).value = object[field];
        }
    }
}
export function showDataSelect  (listObj, selectHtml) {
    listObj.forEach((obj) => {
        const option = document.createElement("option");
        option.setAttribute("value",obj.id);
        option.textContent = obj.name;
        selectHtml.appendChild(option);
    });
}

// Função para exibir mensagens toast
export function showToast (message) {
    const toastContainer = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;

    toastContainer.appendChild(toast);

    // Mostrar a mensagem toast
    setTimeout(() => {
        toast.classList.add('show');
    }, 100);

    // Remover a mensagem toast após 3 segundos
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toastContainer.removeChild(toast);
        }, 500);
    }, 3000);
}

export async function getList ($path) {
    let {data: arr} = await (await fetch(getBackendUrlApi($path), {method: "GET"})).json();
    //console.log(arr)
    return arr;
}

export async function setOption($path, $htmlElement){
    let arr = await getList($path)
    arr.forEach((e) => {
        $htmlElement.innerHTML += `<option value="${e.id}">${e.name}</option>`
    })
}