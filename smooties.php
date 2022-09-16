<?php include 'partials/header.php' ?>

<ul class="recipes">
    <!-- <h1>nothing to show ...</h1> -->

    <li class="recipe">
      <img style="cursor: pointer;" onclick="deleteMe()" src="images/toDo.png">
      <h4>category</h4>
      <p>thingy</p>
    </li>
</ul>

<script>
  function deleteMe( id ) {
    fetch(`/delete/${id}`, {
      method: 'DELETE'
    })
  }
</script>

<?php include 'partials/footer.php' ?>