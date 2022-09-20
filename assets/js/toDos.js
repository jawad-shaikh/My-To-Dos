$(document).ready(function () {
  $.ajax({
    url: "http://localhost/My-To-Dos/api/toDoHandler.php?type=get",
    type: "GET",
    success: function (data) {
      const todos = JSON.parse(data);
      let temp = "";
      if (todos.length > 0) {
        todos.forEach((todo) => {
          temp += `
              <li class="recipe">
                  <img style="cursor: pointer;" onclick="deleteMe(event, ${todo.id})" src="assets/images/toDo.png">
                  <h4>${todo.category}</h4>
                  <p>${todo.thingy}</p>
              </li>
          `;
        });

        document.querySelector(".recipes").innerHTML = temp;
      } else {
        document.querySelector(".recipes").innerHTML =
          "<h1>nothing to show ...</h1>";
      }
    },
  });
});

function deleteMe(e, id) {
  $.ajax({
    url: "http://localhost/My-To-Dos/api/toDoHandler.php?type=delete",
    type: "POST",
    data: {
      id: id,
    },
    success: function () {
      e.target.parentElement.remove();
    },
  });
}
