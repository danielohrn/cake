<template>
  <nav class="navbar navbar is-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="">
        <h1><b>KUNSKAPSNAVET</b></h1>
      </a>
      <div class="navbar-end navbar-menu navbar-menu" id="navMenu">
      <a class="navbar-item">
        <h2><b>Roller</b></h2>
        <h3>Hitta din roll</h3>
      </a>
      <a class="navbar-item">
        <h2><b>Om Kunskapsnavet</b></h2>
        <h3>Information om navet</h3>
      </a>
      <a class="navbar-item">
        <h2><b>FAQ</b></h2>
        <h3>Hitta svar till dina frågor</h3>
      </a>
      <a class="navbar-item">
        <h2><b>Kontakt</b></h2>
        <h3>Kontakta oss</h3>
      </a>
    </div>
      <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {

    }
  }
}
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
</script>


<style scoped>
.section {
  padding: 0;
}
.navbar-item {
  display: flex;
  flex-direction: column;
}
.navbar-item h2 {
  font-size: 1.5em;
}
.navbar-item h1 {
  font-size: 2em;
}
</style>
