let list = document.getElementById('list') as HTMLUListElement;
let formAdd = document.querySelector(".add-task") as HTMLFormElement | null;
let inputTask = document.getElementById("add-task") as HTMLInputElement;
const tasks: Task[] = loadTask();

tasks.forEach(addlistItem);

type Task = {
    id: String,
    title: string,
    completed: boolean,
    createdAt: Date
}

formAdd?.addEventListener('submit', e => {
    e.preventDefault();

  if (inputTask?.value == "" || inputTask?.value == null) return;

  const newTask: Task = {
    id: Math.random() + "",
    title: inputTask.value,
    completed: false,
    createdAt: new Date(),
  };
    tasks.push(newTask);
    
    addlistItem(newTask);
    inputTask.value = "";
})

function addlistItem(task: Task) {
    const item = document.createElement('li');
    const label = document.createElement('label');
    const checkbox = document.createElement("input");

    checkbox.addEventListener('change', () => {
        task.completed = checkbox.checked;
        saveTasks();
    })

    checkbox.type = 'checkbox';
    checkbox.checked = task.completed;

    label.append(checkbox, task.title);
    item.append(label);
    list?.append(item);

    saveTasks();
}


function saveTasks() {
    localStorage.setItem("TASKS", JSON.stringify(tasks));
}
    
function loadTask(): Task[] {

    const taskJson = localStorage.getItem("TASKS");
    if (taskJson == null) return []
    return JSON.parse(taskJson);
     
}