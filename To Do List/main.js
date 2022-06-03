const btnFechar = document.getElementById("fechar");
const addTarefa = document.getElementById("addDo");
const modalContainer = document.getElementById("modalC");
const btnAdd = document.getElementById("enviar");
const nomeInput = document.getElementById("nome");
const dataInicio = document.getElementById("dataI");
const dataFim = document.getElementById("dataT");
const dataTerm = document.querySelector("#dataT");
const table = document.createElement("table");
const divMae = document.getElementById("Nconclued");

// Conclued

const divConcluida = document.querySelector(".conclued");

// Fechar Task


const fecharTask = () => {
  modalContainer.classList.add("off");
  nomeInput.classList.remove("erro");
};

btnFechar.addEventListener("click", fecharTask);

// Abrir Task

const abrirModal = () => {
  modalContainer.classList.remove("off");
};

addTarefa.addEventListener("click", abrirModal);

const validarNome = () => {
  return nomeInput.value.trim().length > 0;
};

const validarDados = () => {
  const validaN = validarNome();

  if (validaN != true) {
    nomeInput.classList.add("erro");
  } else {
    nomeInput.classList.remove("erro");
  }

  // const taskA = document.createElement("a");
  // taskA.classList.add("taskCon");

  const taskContainer = document.createElement("tr");
  taskContainer.classList.add("dados");
  taskContainer.setAttribute("id", "dados");

  const taskNome = document.createElement("td");
  taskNome.innerText = nomeInput.value;

  const taskInicio = document.createElement("td");
  let dataI = new Date(dataInicio.value).toLocaleString();
  taskInicio.innerText = dataI;

  const taskFim = document.createElement("td");
  let dataFi = new Date(dataFim.value).toLocaleString();
  taskFim.innerText = dataFi;

  const tdDelete = document.createElement("td");
  const btDelete = document.createElement("button");
  const iDelete = document.createElement("i");
  iDelete.classList.add("fa-solid");
  iDelete.classList.add("fa-trash");
  btDelete.classList.add("delete");
  btDelete.setAttribute("id", "delete");


  divMae.appendChild(table);
  table.appendChild(taskContainer);
  taskContainer.appendChild(taskNome);
  taskContainer.appendChild(taskInicio);
  taskContainer.appendChild(taskFim);
  taskContainer.appendChild(tdDelete);
  tdDelete.appendChild(btDelete);
  btDelete.appendChild(iDelete);

  iDelete.addEventListener("click", () =>
    concluirTask(taskNome, taskInicio, taskFim, taskContainer)
  );

  const updateLocalStorage = () => {
    const dadosTr = document.querySelectorAll('.dados');
    const task = dadosTr;
    
    for (let i = 0; i < task.length; i++){
      const map = {
        nome: task[0].childNodes,
        dataI: task[1],
        dataF: task[2]
      };

      console.log(map);
    }

    localStorage.setItem("tasks", JSON.stringify(map));
  
  };

updateLocalStorage();
  
};


// console.log(`${key}: ${taskfromLocal[key]}`);


const refreshTest = () => {
  const taskfromLocal = JSON.parse(localStorage.getItem('tasks'));
  for (const key in taskfromLocal) {

    const taskContainer = document.createElement("tr");
    taskContainer.classList.add("dados");
    taskContainer.setAttribute("id", "dados");

    const taskNome = document.createElement("td");
    taskNome.innerText = taskfromLocal.nome;

    const taskInicio = document.createElement("td");
    taskInicio.innerText = taskfromLocal.dataI;

    const taskFim = document.createElement("td");
    taskFim.innerText = taskfromLocal.dataF;


    const tdDelete = document.createElement("td");
    const btDelete = document.createElement("button");
    const iDelete = document.createElement("i");
    iDelete.classList.add("fa-solid");
    iDelete.classList.add("fa-trash");
    btDelete.classList.add("delete");
    btDelete.setAttribute("id", "delete");


    divMae.appendChild(table);
    table.appendChild(taskContainer);
    taskContainer.appendChild(taskNome);
    taskContainer.appendChild(taskInicio);
    taskContainer.appendChild(taskFim);
    taskContainer.appendChild(tdDelete);
    tdDelete.appendChild(btDelete);
    btDelete.appendChild(iDelete);

  }

}

refreshTest();

const tirarErro = () => {
  const validaN = validarNome();

  if (validaN) {
    return nomeInput.classList.remove("erro");
  }
};

const concluirTask = (taskNome, taskInicio, taskFim, taskContainer) => {
  const taskContainerC = document.createElement("tr");
  taskContainerC.classList.add("dados");
  taskContainerC.setAttribute("id", "dados");

  const taskNomeC = document.createElement("td");
  taskNomeC.innerText = taskNome.value;

  const taskInicioC = document.createElement("td");
  taskInicioC.innerText = taskInicio;

  const taskFimC = document.createElement("td");
  taskFimC.innerText = taskFim;

  const task = taskContainer.childNodes;

  updateLocalStorage();
};


const updateLocalStorage = () => {
  const task = taskContainer.childNodes;

  const localTasks = [...task].map(task => {
    const content = task.firstChild;
    console.log(content[1])

    return { description: content.innerText };
  });
}


btnAdd.addEventListener("click", validarDados);
btnAdd.addEventListener("click", fecharTask);

nomeInput.addEventListener("change", tirarErro);
