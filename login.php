<?php include 'partials/header.php' ?>

<form>
  <h2>Login</h2>
  <label for="email">Email</label>
  <input type="text" name="email" required />
  <div class="email error"></div>
  <label for="password">Password</label>
  <input type="password" name="password" required />
  <div class="password error"></div>
  <button>login</button>
</form>

<?php include 'partials/footer.php' ?>