<template>
  <nav class="navbar navbar is-light" role="navigation" aria-label="main navigation">
    <div class="logo navbar-brand">
      <a href="">
        <h1><b>KUNSKAPSNAVET</b></h1>
      </a>
    </div>
      <div class="menuItems navbar-end navbar-menu navbar-menu" aria-label="dropdown navigation">
      <div class="dropdownTag navbar-item has-dropdown is-hoverable">
        <div class="dropdown-trigger">
        <div class="navbar-link">
          <div>
        <h2 class='has-text-centered'><b>Roller</b></h2>
        <h3>Hitta din roll</h3>
        </div>
        </div>
        <div class="dropContent navbar-dropdown " role="menu">
          <div class="columns">
           <div class="column" v-for="(role, i) in allRoles" :key="i">
               <div @click="filter(role, i)" class="role-item">
                 <h2 class="title is-5 is-uppercase has-text-weight-semibold">{{role.name}}</h2>
                 <p>Information om rollen</p>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
      <a class="navbar-item">
        <h2><b>Om Kunskapsnavet</b></h2>
        <h3>Information om navet</h3>
      </a>
      <a class="navbar-item">
        <h2><b>FAQ</b></h2>
        <h3>Hitta svar till dina frågor</h3>
      </a>
      <a @click="newProject" class="navbar-item">
        <svg class="add-icon" xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 24 24">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
        </svg>
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
  import {
    mapState
  } from 'vuex'
  export default {
    name: 'Home',
    computed: mapState(['role', 'allRoles']),
    data() {
      return {}
    },
    mounted() {
      this.getRoles()
    },
    methods: {
      filter(role, index) {
        const payload = {};
        payload.role = role;
        payload.role.index = index;
        console.log(payload);
        this.$store.commit('updateUserRole', payload)
        this.$router.push('/articles' + role.url)
      },
      getRoles() {
        axios.get('/api/roles')
          .then(response => {
            let allRoles = {};
            allRoles = response.data
            this.$store.commit('updateRoles', allRoles)
          })
      },
      newProject(){
        this.$emit('newProject', true);
      }
    }

  }
  document.addEventListener('DOMContentLoaded', function() {

    // Get all "navbar-burger" elements
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

      // Add a click event on each of them
      $navbarBurgers.forEach(function($el) {
        $el.addEventListener('click', function() {

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
    font-size: 1.2em;
  }

  .navbar-item h3 {
    font-size: 0.9em;
  }

  .logo h1 {
    font-size: 1.5em;
  }

  .logo {
    display: flex;
  }

  .logo a {
    align-self: center;
    padding: 1em;
    color: #000;
    margin-left: 2em;
  }

  .navbar {
    display: flex;
    justify-content: center;
  }

  .menuItems {
    justify-content: space-around;
    margin-right: 6em;
    padding-bottom: 0.7em;
  }

  .menuItems a {
    margin: 0 2em 0 2em;
  }

  .columns {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
  }

  .role-item {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    height: 100px;
    width: 160px;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    /* border: 3px solid #aedebf; */
    border-radius: 10px;
    background-color: #fff;
  }

  .role-item h2 {
    color: #000;
    margin: 0;
    margin-bottom: 0.5em;
  }
  .add-icon {
    color: #aedebf;
    fill:currentColor;
  }

  .role-item:hover {
    background-color: #aedebf;
  }

  /* .role-item:hover:after {
    content: " ";
    display: flex;
    width: 20%;
    border-bottom: 3px solid #000;
  } */

  .dropContent {
    width: 1000px;
    padding: 1em 1em 1em 6em;
  }
</style>
