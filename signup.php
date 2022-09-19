<?php include 'partials/header.php' ?>

<form id="form">
  <h2>Sign up</h2>
  <label for="email">Username</label>
  <input type="text" name="username" id="username" required />
  <small class="username error"></small>
  <label for="email">Email</label>
  <input type="text" name="email" id="email" required />
  <small class="email error"></small>
  <label for="password">Password</label>
  <input type="password" name="password" id="password" required />
  <small class="password error"></small>
  <button id="signupBtn">Sign up</button>
</form>

<script src="assets/js/signup.js"></script>
<?php include 'partials/footer.php' ?>