<?php include 'partials/header.php' ?>

<form>
  <h2>Add To do</h2>
  <label for="category">category</label>
  <select name="category" id="category">
    <option>choose..</option>
        <option value="one">one</option>
  </select>
  <label for="Thingy">Thingy</label>
  <input type="text" name="thingy" id="thingy" required />
  <button>Add</button>
</form>

<?php include 'partials/footer.php' ?>