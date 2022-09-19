<?php include 'partials/header.php' ?>

<form>
  <h2>Login</h2>
  <label for="email">Email</label>
  <input type="text" name="email" id="email" required />
  <small class="email error"></small>
  <label for="password">Password</label>
  <input type="password" name="password" id="password" required />
  <small class="password error"></small>
  <button id="loginBtn">login</button>
</form>

<script src="assets/js/login.js"></script>
<?php include 'partials/footer.php' ?>