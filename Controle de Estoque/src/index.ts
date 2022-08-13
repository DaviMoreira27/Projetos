// DOM Calls

let formAdd = document.querySelector(".form-adder") as HTMLFormElement;
let inputsForm = document.querySelectorAll('.form-adder input') as NodeList;
let viewerProd = document.querySelectorAll('.prod-box h3') as NodeList;


type Produto = {
    id: string;
    nome: string;
    peso: string;
    porte: string;
    animal: string;
    valor: number;
    quantidade: number;
    status: boolean;
    lastOrder: Date;
};

formAdd?.addEventListener('submit', (event) => {
    event.preventDefault();

    function checkUnset() {
      for (let i = 0; i < inputsForm.length; i++) {
        
      }
    }

    

});

