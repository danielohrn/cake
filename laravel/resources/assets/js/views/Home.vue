<template>
<section class="section">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <h1 class="logotype navbar-item">Kunskapsnavet</h1>
    </div>
  </nav>

  <div class="columns padding-x">
<<<<<<< HEAD
    <div class="" v-for="(role, i) in allRoles">
=======
    <div class="" v-for="(role, i) in allRoles" :key="i">
>>>>>>> 9175b652aef09039c5fc329e8d43dce66edd1d54
      <overdrive :id="i" :duration="350">
        <div @click="filter(role, i)" class="role-item is-2" :style="{backgroundColor: role.color}">
          <h2 class="title is-3">{{role.name}}</h2>
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
  padding-top: 0;
}

.navbar {
  width: 100%;
  background: #000;
  margin-bottom: 2em;
}

.columns {
  width: 100%;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  padding-left: 4em;
  padding-right: 4em;
  margin: 0;
}

.role-item {
  display: flex;
  height: 180px;
  width: 260px;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  margin-bottom: 2em;
}

h1,
h2 {
  font-weight: normal;
  color: white;
  text-transform: uppercase;
}
</style>
