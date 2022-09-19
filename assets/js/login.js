const loginBtn = document.getElementById("loginBtn");

loginBtn.addEventListener("click", (e) => {
  e.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  $.ajax({
    url: "http://localhost/My-To-Dos/api/userHandler.php?type=login",
    type: "POST",
    data: {
      email: email,
      password: password,
    },
    success: function (data) {
      data = JSON.parse(data);
      document.querySelector(".email").textContent = data.email;
      document.querySelector(".password").textContent = data.password;
      if (data.success) {
        window.location = window.location;
      }
    },
  });
});
