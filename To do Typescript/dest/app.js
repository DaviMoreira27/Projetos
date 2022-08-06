"use strict";
let list = document.getElementById('list');
let formAdd = document.querySelector(".add-task");
let inputTask = document.getElementById("add-task");
const tasks = loadTask();
tasks.forEach(addlistItem);
formAdd === null || formAdd === void 0 ? void 0 : formAdd.addEventListener('submit', e => {
    e.preventDefault();
    if ((inputTask === null || inputTask === void 0 ? void 0 : inputTask.value) == "" || (inputTask === null || inputTask === void 0 ? void 0 : inputTask.value) == null)
        return;
    const newTask = {
        id: Math.random() + "",
        title: inputTask.value,
        completed: false,
        createdAt: new Date(),
    };
    tasks.push(newTask);
    addlistItem(newTask);
    inputTask.value = "";
});
function addlistItem(task) {
    const item = document.createElement('li');
    const label = document.createElement('label');
    const checkbox = document.createElement("input");
    checkbox.addEventListener('change', () => {
        task.completed = checkbox.checked;
        saveTasks();
    });
    checkbox.type = 'checkbox';
    checkbox.checked = task.completed;
    label.append(checkbox, task.title);
    item.append(label);
    list === null || list === void 0 ? void 0 : list.append(item);
    saveTasks();
}
function saveTasks() {
    localStorage.setItem("TASKS", JSON.stringify(tasks));
}
function loadTask() {
    const taskJson = localStorage.getItem("TASKS");
    if (taskJson == null)
        return [];
    return JSON.parse(taskJson);
}
