<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>My Page</title>
    <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      background: linear-gradient(to right, #505162, #18783f);
      height: 100vh;
    }
    form {
      width: 50%;
      margin-bottom: 20px;
    }
    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      outline: none;
      box-shadow: 0px 0px 10px #ccc;
    }
    button[type="submit"] {
      padding: 10px 20px;
      background-color: #444358;
      color: #fff;
      border: none;
      border-radius: 5px;
      outline: none;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }
    button[type="submit"]:hover {
      background-color: #092014;
    }
    ul {
      width: 50%;
      list-style: none;
      padding: 0;
    }
    .task {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 10px;
      background-color: #fff;
      box-shadow: 0px 0px 10px #ccc;
      transition: all 0.3s ease-in-out;
      overflow: hidden;
    }
    .task:hover {
      padding: 20px;
      background-color: #eee;
    }
    .task-text {
      max-width: 70%;
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
    }
    .delete-button {
      background-color: #444358;
      color: #fff;
      border: none;
      border-radius: 5px;
      outline: none;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      padding: 5px 10px;
    }
    .delete-button:hover {
      background-color: red;
    }
    h1{
    	color: #fff;
    }
  </style>
</head>
<body>
  <h1>To-Do List</h1>
  <form id="form">
    <input type="text" id="task" placeholder="Add task">
    <button type="submit">Add</button>
  </form>
  <ul id="tasks">

  </ul>
</body>


<script type="text/javascript">
const form = document.querySelector('form');
const taskInput = document.querySelector('#task');
const tasksList = document.querySelector('#tasks');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (taskInput.value.length > 0) {

  	 addTask(taskInput.value);
  	taskInput.value = '';
  }else{
  	  	alert('please fill input');

  }



});

function addTask(task) {
  const li = document.createElement('li');

  li.classList.add("task"); 
  li.innerHTML = `<span class="task-text">${task}</span>
    <button name="delete" class='delete-button'>Delete</button>
  `;

  tasksList.appendChild(li);

  const deleteBtn = li.querySelector('button[name="delete"]');
  deleteBtn.addEventListener('click', () => {
    removeTask(task);
    li.remove();
  });

  saveTask(task);
}


function saveTask(task) {
  let tasks;
  if (localStorage.getItem('tasks') === null) {
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  if (!tasks.includes(task)) {
    tasks.push(task);
  }

  localStorage.setItem('tasks', JSON.stringify(tasks));
}


function removeTask(task) {
  let tasks = JSON.parse(localStorage.getItem('tasks'));
  tasks.forEach((t, index) => {
    if (t === task) {
      tasks.splice(index, 1);
    }
  });
  localStorage.setItem('tasks', JSON.stringify(tasks));
}

document.addEventListener('DOMContentLoaded', () => {
  let tasks = JSON.parse(localStorage.getItem('tasks'));
  if (tasks !== null) {
    tasks.forEach((task) => {
      addTask(task);
    });
  }
});


</script>
</body>
</html>