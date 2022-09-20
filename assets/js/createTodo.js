const createBtn = document.getElementById("createBtn");

createBtn.addEventListener("click", (e) => {
  e.preventDefault();

  const category = document.getElementById("category").value;
  const thingy = document.getElementById("thingy").value;

  $.ajax({
    url: "http://localhost/My-To-Dos/api/toDoHandler.php?type=create",
    type: "POST",
    data: {
      category: category,
      thingy: thingy,
    },
    success: function (data) {
      data = JSON.parse(data);
      if (data.success) createBtn.innerText = "Added!";
    },
  });
});
