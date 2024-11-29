class Toast {
    static showToast(response, message) {
        if (!response || !response.type || !response.message) {
            console.error("Resposta inválida!");
            return;
        }
        const { type } = response;
        let backgroundColor;
        switch (type) {
            case "success":
                backgroundColor = "green";
                break;
            case "error":
                backgroundColor = "red";
                break;
            case "warning":
                backgroundColor = "yellow";
                break;
            default:
                console.error("Tipo inválido!");
                return;
        }

        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.style.backgroundColor = backgroundColor;
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
            }, 500);
        }, 1000);
    }
}

export default Toast;
