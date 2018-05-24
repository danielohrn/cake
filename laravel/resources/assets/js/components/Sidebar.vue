<template>
  <div class='sidebarContainer'>
  <aside id='sidebar' class="menu">
    <div class='closeBtn'>
    <span v-on:click='closeBtn'>&times;</span>
  </div>
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
.sidebarContainer
 {
  display: flex;
  position : absolute;
  width: 170px;
  height: 100%;
  z-index: 3;
  flex: 1 1 0%;
  flex-grow: 0;
  flex-shrink: 0;
}
.menu {
  width: 170px;
  height: 100%;
  background-color: #ccc;
  padding: 1em;
  left: 0;
  position: relative;
  transition: all 0.6s;
}
.menu p {
  color: black;
}
.menu ul li a {
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
.closeBtn span:hover {
  opacity: 0.7;
}
</style>
