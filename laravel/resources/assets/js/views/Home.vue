<template>
<section class="section">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <h1 class="logotype navbar-item">Kunskapsnavet</h1>
    </div>
  </nav>

  <div class="columns is-inline-flex-mobile">
    <div class="column is-desktop is-one-quarter " v-for="(role, i) in allRoles" :key="i">
      <overdrive :id="i" :duration="350">
        <div @click="filter(role, i)" class="role-item" :style="{backgroundColor: role.color}">
          <h2 class="title is-4 is-desktop-only">{{role.name}}</h2>
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
  computed: mapState(['role', 'allRoles']),
  data() {
    return {
    }
  },
  mounted(){
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
    getRoles(){
      axios.get('/api/roles')
      .then(response => {
        let allRoles = {};
        allRoles = response.data
        this.$store.commit('updateRoles', allRoles)
      })
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
section {
  padding: 0;
}

.navbar {
  width: 100%;
  background: #000;
  margin-bottom: 2em;
}

.columns {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  margin: 0;
  padding-left: 10em;
  padding-right: 10em;
}

.role-item {
  display: flex;
  height: 180px;
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
@media only screen and (min-width: 768px) {
    .role-item {
      width: 180px;
    }
    .columns {
      padding: 0;
    }
    .is-one-quarter {
      padding: 0;
      margin: 0;
    }
}
@media only screen and (max-width: 768px) {
    .role-item {
      width: 180px;
    }
    .columns {
      padding: 0;
    }
    .is-one-quarter {
      padding: 0;
      margin: 0;
    }
}
</style>
