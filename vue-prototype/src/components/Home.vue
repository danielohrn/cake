<template>
<section class="section">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <h1 class="logotype navbar-item">Kunskapsnavet</h1>
      <!-- <img src="https://kalmar.se/images/18.3d99d73715c38c8a9e12a16/1496230718775/(2)%20KUNSKAPSNAVET_LOGO.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28"> -->
    </a>
      <!-- <a class="navbar-item" href="#">Link</a>
      <a class="navbar-item" href="#">Link</a>
      <a class="navbar-item" href="#">Link</a> -->
      <div class="navbar-burger">
        <span>Link</span>
        <span>Link</span>
        <span>Link</span>
      </div>
    </div>
  </nav>

  <div class="columns">

    <div class="column is-one-fifth" v-for="(role, i) in roles">
      <overdrive :id="i" :duration="350">
        <div @click="filter(role, i)" class="role" :style="{backgroundColor: role.color}">
          <div class="flex-item">
            <h2 class="title is-2">{{role.name}}</h2>
          </div>
        </div>
      </overdrive>
    </div>

  </div>
</section>
</template>

<script>
import {
  mapState
} from 'vuex'
export default {
  name: 'Home',
  computed: mapState(['role']),
  data() {
    return {
      roles: [{
        url: '/konstnar',
        name: 'konstnär',
        color: '#4286f4'
      }, {
        url: '/politiker',
        name: 'politiker',
        color: '#d81e6f'
      }, {
        url: '/tjänstemän',
        name: 'tjänstemän',
        color: '#ffc107'
      }, {
        url: '/byggbolag',
        name: 'byggbolag',
        color: '#20c997'
      }, {
        url: '/beställare',
        name: 'beställare',
        color: '#6f42c1'
      }, {
        url: '/utförare',
        name: 'utförare',
        color: '#6c757d'
      }, {
        url: '/arkitekt',
        name: 'arkitekt',
        color: '#28a745'
      }, {
        url: '/curator',
        name: 'curator',
        color: '#fd7e14'
      }],
    }
  },
  methods: {
    filter(role, index) {
      const payload = {};
      payload.role = role;
      payload.role.index = index;
      console.log(payload);
      this.$store.commit('updateRole', payload)
      this.$router.push('/articles' + role.url)
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.navbar {
  margin: 0 8rem;
  background: #000; 
}
section {
  padding-top: 0;
}

.is-one-fifth > div {
  width: 100%;
}
.columns {
  padding: 2rem 8rem;
  display: flex;
  flex-wrap: wrap;
}

.columns h2 {
  font-size: 1.5em;
}

.column {
  display: flex;
  width: 25%;
}

.role {
  display: flex;
  height: 180px;
  width: 100%;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

h1,
h2 {
  font-weight: normal;
  color: white;
  text-transform: uppercase;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
