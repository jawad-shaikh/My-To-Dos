const signupBtn = document.getElementById("signupBtn");

signupBtn.addEventListener("click", (e) => {
  e.preventDefault();

  const username = document.getElementById("username").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  $.ajax({
    url: "http://localhost/My-To-Dos/api/userHandler.php?type=signup",
    type: "POST",
    data: {
      username: username,
      email: email,
      password: password,
    },
    success: function (data) {
      data = JSON.parse(data);
      document.querySelector(".username").textContent = data.username;
      document.querySelector(".email").textContent = data.email;
      document.querySelector(".password").textContent = data.password;
      if (data.success) {
        window.location = window.location;
      }
    },
  });
});
