<template>
<section class="section">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <h1 class="logotype navbar-item">Kunskapsnavet</h1>
    </div>
  </nav>
  <div class='columns flex'>
<div class='column num1'>
  <h1 class='title is-2'> Välkommen till kunskapsnavet </h1>
  <h3 class='subtitle'>Målet med kunskapsnavet är att du ska kunna hitta konkret information i olika frågor som rör allt från hur man startar ett konstprojekt till hur man förverkligar det och hur man förvaltar det. Navet ska inspirera och stärka utvecklingen av offentlig konst i hela Sverige. Dessutom ska det hålla samtalet om den offentliga konstens roll i samhället levande. Det kommer att lyfta fram viktig kunskap som redan finns på olika håll i landet och ta fram ny kunskap som saknas. Kunskapsnav offentlig konst blir en samlande plattform för möten, erfarenheter och information. Här öppnas möjligheten att både få och ge kunskaper inom många olika områden och yrkesroller.</h3>
</div>
<div class='column num2'>
  <h1 class='title is-3 has-text-right'>Hur navigerar jag?</h1>
  <p class='subtitle has-text-right'> Hitta ditt roll, välj dom taggar som passar till din sökning då ska du hitta rätt!</p>
</div>
</div>
  <div class="columns role-box is-inline-flex-mobile">
    <div class="column is-desktop is-one-quarter" v-for="(role, i) in allRoles" :key="i">
      <overdrive :id="i" :duration="350">
        <div @click="filter(role, i)" class="role-item">
          <h2 class="title is-5 is-uppercase has-text-weight-semibold is-desktop-only">{{role.name}}</h2>
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
.role-item h2 {
color: #000;
padding: 1em;
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
  background-color: #38ee78;

}

h1 {
  font-weight: normal;
  color: white;
  text-transform: uppercase;
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
.flex {
  display: flex;
  flex-direction: column;
}
.flex h1 {
  color: black;
  margin-bottom: 1.5em;
}
.flex h2 {
  margin-bottom: 1.5em;
}
.flex h3 {
  padding-left: 2em;
  padding-right: 2em;
  margin-left: 1em;
  padding-bottom: 1em;
}
.flex p {
  padding-left: 2em;
  padding-right: 2em;
}
.num1 {
  padding: 2em;
  border-top: 2px solid #38ee78;
  border-left: 2px dotted #38ee78;
  border-bottom: 2px solid #38ee78;
  border-right: 2px dotted #38ee78;
}
.num2 {
  border-right: 2px dotted #38ee78;
  border-bottom: 2px solid #38ee78;
  padding: 2em;
  margin-bottom: 1em;
}
.role-box {
  margin-bottom: 4em;
}
</style>
<!-- :style="{color: role.color}" -->
