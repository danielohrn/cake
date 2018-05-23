<template>
<div class="section">
  <aside class="menu">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a>Dashboard</a></li>
      <li><a>Customers</a></li>
    </ul>
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a>Dashboard</a></li>
      <li><a>Customers</a></li>
    </ul>

  </aside>
  
</div>
</template>

<script>
export default {
  data() {
    return {

    }
  }
}
</script>

<style scoped>
.section {
  padding: 2em;
  width: 70%;
  height: auto;
  left: 100%;
  background-color: black;
  z-index: 9999;
  position: relative;
}
aside {
  position: fixed;
}
</style>
