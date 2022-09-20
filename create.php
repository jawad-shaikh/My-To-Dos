<?php include 'partials/header.php' ?>

<form>
  <h2>Add To do</h2>
  <label for="category">category</label>
  <select name="category" id="category">
    <option value="work">work</option>
    <option value="shopping">shopping</option>
    <option value="study">study</option>
  </select>
  <label for="Thingy">Thingy</label>
  <input type="text" name="thingy" id="thingy" required />
  <button id="createBtn">Add</button>
</form>

<script src="assets/js/createTodo.js"></script>
<?php include 'partials/footer.php' ?>