<template>
  <div class='sidebarContainer'>
  <!-- <button v-if="!open" class='menuBtn' v-on:click='toggle'>Menu</button> -->
  <svg  v-if="!open" class='menuBtn' v-on:click='toggle' xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
  <aside v-if="open" id='sidebar' class="menu">

    <div class='closeBtn'>
      <span v-on:click='toggle'>&times;</span>
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
      open: false,

    }
  },
  methods: {
    toggle() {
      this.open = !this.open;
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

.menuBtn {
  position: absolute;
  left: 10px;
  padding: 0.5em;
  margin-bottom: 2em;
  color: white;
  /* border-radius: 5px; */
  outline: none;
  top: 10px;
  z-index: 2;
  cursor: pointer;
}
</style>
