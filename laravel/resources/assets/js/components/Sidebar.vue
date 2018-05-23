<template>
<div id='sidebar' class="section">
  <div class='closeBtn'>
  <span v-on:click='closeBtn'>&times;</span>
</div>
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
  },
  methods: {
    closeBtn() {
      document.getElementById('sidebar').style.left = '-100%';
    }
  }
}
</script>

<style scoped>
.section {
  display: flex;
  flex-direction: column;
  padding: 2em;
  width: 20%;
  height: auto;
  left: 0;
  background-color: grey;
  opacity: 0.7;
  z-index: 9999;
  position: relative;
  transition: all 0.6s;
  overflow: none;
}
aside p {
  color: black;
}
aside ul li a {
  color: black;
}
.closeBtn {
  text-align: right;
}
.closeBtn span {
    cursor: pointer;
    font-size: 40px;
    font-weight: bold;
}
</style>
