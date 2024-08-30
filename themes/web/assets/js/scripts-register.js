const formRegister = document.querySelector("#RegForm");

formRegister.addEventListener("submit",async (event) => {
    event.preventDefault();
    const data = await fetch(`http://localhost:8080/X1-Clothes/api/users`,{
        method: "POST",
        body: new FormData(formRegister)
    });
    const user = await data.json();
    console(user);
});