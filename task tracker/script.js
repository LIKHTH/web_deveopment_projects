const taskInput = document.getElementById("taskInput");
const addTaskBtn = document.getElementById("addTaskBtn");
const taskList = document.getElementById("taskList");

let tasks = [];

addTaskBtn.addEventListener("click", addTask);

function addTask() {
    const taskText = taskInput.value.trim();
    if (taskText === "") return;

    const newTask = {
        text: taskText,
        completed: false
    };

    tasks.push(newTask);
    updateTasks();

    taskInput.value = "";
}

function updateTasks() {
    taskList.innerHTML = "";
    tasks.forEach((task, index) => {
        const taskItem = document.createElement("li");
        taskItem.innerHTML = `
            <span class="${task.completed ? 'completed' : ''}">${task.text}</span>
            <button class="completeBtn" onclick="toggleComplete(${index})">Complete</button>
            <button class="removeBtn" onclick="removeTask(${index})">Remove</button>
        `;

        taskList.appendChild(taskItem);
    });

    saveTasksToLocalStorage();
}

function toggleComplete(index) {
    tasks[index].completed = !tasks[index].completed;
    updateTasks();
}

function removeTask(index) {
    tasks.splice(index, 1);
    updateTasks();
}

function saveTasksToLocalStorage() {
    localStorage.setItem("tasks", JSON.stringify(tasks));
}

function loadTasksFromLocalStorage() {
    const storedTasks = localStorage.getItem("tasks");
    if (storedTasks) {
        tasks = JSON.parse(storedTasks);
        updateTasks();
    }
}

loadTasksFromLocalStorage();
