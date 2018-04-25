<template>
<section class="section">
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <h1 class="logotype navbar-item">Kunskapsnavet</h1>
    </div>
  </nav>
  <div class='columns main-column'>
    <div class='column num1'>
      <h1 class='title is-2'> Välkommen till kunskapsnavet </h1>
      <h3 class='subtitle'>Målet med kunskapsnavet är att du ska kunna hitta konkret information i olika frågor som rör allt från hur man startar ett konstprojekt till hur man förverkligar det och hur man förvaltar det. Navet ska inspirera och stärka utvecklingen av offentlig konst i hela Sverige. Dessutom ska det hålla samtalet om den offentliga konstens roll i samhället levande. Det kommer att lyfta fram viktig kunskap som redan finns på olika håll i landet och ta fram ny kunskap som saknas. Kunskapsnav offentlig konst blir en samlande plattform för möten, erfarenheter och information. Här öppnas möjligheten att både få och ge kunskaper inom många olika områden och yrkesroller.</h3>
    </div>
    <div class='column num2'>
      <h1 class='title is-3 has-text-right'>Hur navigerar jag?</h1>
      <p class='subtitle has-text-right'> Hitta din roll, välj sedan dom taggar som passar till just din sökning så ska du hitta rätt!</p>
    </div>
  </div>
  <div class="columns is-inline-flex-mobile">
    <div class="column is-one-quarter" v-for="(role, i) in allRoles" :key="i">
      <overdrive :id="i" :duration="350">
        <div @click="filter(role, i)" class="is-mobile role-item">
          <h2 class="title is-5 is-uppercase has-text-weight-semibold is-desktop-only">{{role.name}}</h2>
        </div>
      </overdrive>
    </div>
  </div>
  <footer>
    <div>
      <img src="/img/facebook.png" width='50' height='50' />
      <img src="/img/instagram.png" width='50' height='50' />
    </div>
  </footer>
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
  margin-bottom: 2em;
}

.main-column {
  display: flex;
  flex-direction: column;
}

.main-column h1 {
  color: black;
  margin-bottom: 1.5em;
  font-weight: normal;
  text-transform: uppercase;
}

.main-column h3 {
  margin-left: 1em;
  padding-bottom: 1em;
  padding-left: 2em;
  padding-right: 2em;
}

.num1,
.num2 {
  padding: 2em;
}

.num1 {
  border-top: 2px solid #38ee78;
  border-left: 2px solid #38ee78;
  border-bottom: 2px solid #38ee78;
}

.num2 {
  border-right: 2px solid #38ee78;
  border-bottom: 2px solid #38ee78;
  margin-bottom: 1em;
}

.role-item {
  display: flex;
  flex-direction: column;
  height: 180px;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  background-color: #38ee78;
}

.role-item h2 {
  color: #000;
  padding: 1em;
  padding-bottom: 1em;
}

.role-item:hover:after {
  content: "";
  display: flex;
  margin: 0 auto;
  width: 20%;
  border-bottom: 3px solid #000;
  text-transform: lowercase;
  color: white;
}

h1 {
  color: white;
}

footer {
  display: flex;
  justify-content: center;
  background-color: #000;
  color: white;
  padding: 2em;
}
@media only screen and (max-width: 1138px) {
  div {
    margin-right: 0;
  }
  .role-item h2{
    font-size: 2vh;
  }
  .role-box {
    display: flex;
    justify-content: center;
  }
  .columns {
    padding: 1.5em;
    margin: 0;
  }
}
@media only screen and (max-width: 819px) {
  .role-item h2{
    font-size: 2vh;
  }
  .role-box {
    display: flex;
    justify-content: center;
  }
  .columns {
    padding: 1.5em;
    margin: 0;
  }
}
@media only screen and (max-width: 768px) {
  .role-item {
    width: 180px;
  }
  .columns {
    padding: 1em;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 2vh;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 751px) {
  .role-item {
    width: 150px;
    height: 150px;
  }
  .columns {
    padding: 1em;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 2vh;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 631px) {
  .role-item {
    width: 140px;
    height: 140px;
    margin: 0;
  }
  .columns {
    padding: 1em;
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 2vh;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 591px) {
  .role-item {
    width: 130px;
    height: 130px;
    margin: 0 !important;
  }
  .columns {
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 2vh;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 551px) {
  .role-item {
    width: 120px;
    height: 120px;
  }
  .columns {
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 2vh;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 511px) {
  .role-item {
    width: 200px;
    height: 200px;
    margin: 0;
  }
  div {
    margin: 0;
  }
  .columns {
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 100%;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 431px) {
  .role-item {
    width: 35vh;
    height: 35vh;
  }
  .columns {
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 70%;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
@media only screen and (max-width: 400px) {
  .role-item {
    width: 25vh;
    height: 25vh;
  }
  .columns {
    margin: 0;
  }
  .is-one-quarter {
    padding: 0;
    margin: 0;
  }
  .main-column h1 {
    font-size: 5vh;
  }
  .column h2 {
    font-size: 70%;
  }
  .main-column h3,
  p {
    padding: 0;
    margin: 0;
    font-size: 2.7vh;
  }
  .role-item {
    border: 0.5px solid white;
  }
  .num1 {
    border-top: none;
  }
}
</style>
