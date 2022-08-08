let addProdBtn = document.getElementById("add-prod") as HTMLButtonElement;
let formAddProd = document.querySelector(".add-prod-form") as HTMLDivElement;

addProdBtn.addEventListener('click', () => {
    formAddProd?.classList.toggle('active');

    if (formAddProd?.classList.contains('active')) {
        let closeAddProd = document.getElementById("close") as HTMLButtonElement;
        
        closeAddProd.addEventListener('click', () => {
            formAddProd?.classList.remove("active");
        });
    }
});
