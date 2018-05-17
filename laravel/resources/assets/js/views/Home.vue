<template>
<section class="section">
  <NavBar></NavBar>
  <div class='image-container'>
    <img class='image' src='img/indexPhoto3.png' width='100%' />
    <div class="text">
   <h1>Välkommen<br/>till Kunskapsnavet</h1>
   <h3>Här hittar du allting om offentlig konst</h3>
   <div class='btnParent'>
   <router-link to='/articles'><button class='btn'>Läs Mer</button></router-link>
 </div>
 </div>
  </div>
  <div class='information'>
    <div class='infoCol1'>
      <h1>Vilka är vi?</h1>
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
    </div>
    <div class='border'></div>
    <div class='infoCol2'>
      <h1>Om Oss</h1>
      <p>Statens konstråd utvecklar sammanhang där samtidskonst och offentliga rum möts. Vi producerar permanenta och tillfälliga konstprojekt i offentliga miljöer och engagerar konstnärer i stadsutvecklingsprojekt, samt sprider kunskap och erfarenheter
        vidare i Sverige och utomlands.</p>
    </div>
  </div>
  <div class='boxes'>
    <div>
      <h2>Så här går det till</h2>
    </div>
    <div class='bothCols'>
      <div class='leftCol'>
        <div class='col col1'>
          <div class='text-box'>
            <h3>HUR?</h3>
            <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
          </div>
        </div>
        <div class='col col3'>
          <div class='text-box'>
            <h3>HUR?</h3>
            <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
          </div>
        </div>
      </div>
      <div class='vr-line'></div>
      <div class='rightCol'>
        <div class='col col2'>
          <div class='text-box'>
            <h3>HUR?</h3>
            <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
          </div>
        </div>
        <div class='col col4'>
          <div class='text-box'>
            <h3>HUR?</h3>
            <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="columns is-inline-flex-mobile">
   <div class="column is-one-quarter" v-for="(role, i) in allRoles" :key="i">
     <overdrive :id="i" :duration="350">
       <div @click="filter(role, i)" class="is-mobile role-item">
         <h2 class="title is-5 is-uppercase has-text-weight-semibold is-desktop-only">{{role.name}}</h2>
       </div>
     </overdrive>
   </div>
 </div> -->
 </div>
 <Footer></Footer>
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
.section {
  padding: 0;
}
.image-container {
position: relative;
}
.text {
  z-index: 100;
  position: absolute;
  color: white;
  font-weight: bold;
  left: 30px;
  top: 70px;
}
.text h1 {
  font-size: 50px;
  padding: 0.5em;
  font-weight: bold;
  text-transform: uppercase;
}
.text h3 {
  font-size: 30px;
  padding-left: 1em;
  font-weight: bold;
}
.btnParent {
  padding: 2em 10em;
}
.btn {
  padding: 0.5em 2em;
  background-color: transparent;
  color: white;
  border: 2px solid white;
  font-size: 1.5em;
  font-weight: bold;
}
.btn:hover {
  background-color: #aedebf;
  color: black;
}
.information {
  display: flex;
  margin-top: 4em;
  margin-bottom: 4em;
}
.infoCol1 {
  flex: 1;
  padding: 0 1em 1em 5em;
}

.infoCol1 p {
  font-size: 20px;
  padding: 1em;
}

.infoCol2 p {
  padding: 1em;
  font-size: 20px;
}

.infoCol1 h1 {
  text-align: center;
  font-size: 2em;
  font-weight: bold;
}

.infoCol2 {
  flex: 2;
  padding: 0 5em 1em 1em;

}

.infoCol2 h1 {
  font-size: 2em;
  padding-left: 0.5em;
  font-weight: bold;
}

.border {
  border: 2px solid #52A76F;
}

.vr-line {
  display: block;
  width: 10.5px;
  background-color: #52A76F;
  margin-top: 5em;
  height: 660px;
}

.boxes {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  background-color: #aedebf;
  margin-bottom: 5em;
}

.boxes h2 {
  color: #000;
  font-size: 1.5em;
  text-align: center;
  padding: 1em 1em 0 1em;
  margin: 0;
  font-weight: bold;
}

.bothCols {
  display: flex;
  margin-bottom: 8em;
  height: 700px;
}

.leftCol {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-right: 3em;
}

.rightCol {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-left: 3em;
}

.col {
  background-color: white;
  border-radius: 10px;
  width: 60%;
}

.col1 {
  align-self: flex-end;
  padding: 1em;
  position: relative;
  margin-bottom: 5em;
}

.col2 {
  align-self: flex-start;
  padding: 1em;
  position: relative;
  margin-bottom: 5em;
  margin-top: 15em;
}

.col3 {
  align-self: flex-end;
  padding: 1em;
  position: relative;

}

.col4 {
  align-self: flex-start;
  padding: 1em;
  position: relative;
}

.col1:after,
.col1:before,
.col3:after,
.col3:before {
  left: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.col1:after,
.col3:after {
  border-color: rgba(255, 255, 255, 0);
  border-left-color: white;
  border-width: 30px;
  margin-top: -30px;
}

.col1:before,
.col3:before {
  border-width: 36px;
  margin-top: -36px;
}

.col2:after,
.col2:before,
.col4:after,
.col4:before {
  right: 100%;
  top: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}

.col2:after,
.col4:after {
  border-color: rgba(255, 255, 255, 0);
  border-right-color: white;
  border-width: 30px;
  margin-top: -30px;
}

.col2:before,
.col4:before {
  border-width: 36px;
  margin-top: -36px;
}

.text-box {
  padding: 1em;
}

.text-box h3 {
  font-weight: bold;
}
.columns {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  padding-left: 10em;
  padding-right: 10em;
  margin-bottom: 4em;
}
.role-item {
  display: flex;
  flex-direction: column;
  height: 200px;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  border: 3px solid #aedebf;
  border-radius: 10px;
  background-color: #fff;
}

.role-item h2 {
  color: #000;
  padding: 1em;
  padding-bottom: 1em;
}
.role-item:hover {
  background-color: #aedebf;
}
.role-item:hover:after {
  content: " ";
  display: flex;
  margin: 0 auto;
  width: 20%;
  border-bottom: 3px solid #000;
}
.indexPhoto {
  position: relative;
   width: 100%;
}
.indexPhoto h2 {
  position: absolute;
  top: 400px;
  left: 50px;
  width: 100%;
  color: white;
}
.indexPhoto h2 span {
  color: white;
font: bold 30px Helvetica, Sans-Serif;
letter-spacing: 1px;
}
</style>
