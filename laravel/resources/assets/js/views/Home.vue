<template>
<section class="section">
  <NavBar></NavBar>
  <div>
    <img src='img/indexphoto.png' width='100%' />
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
  <div class='boxes '>
    <h1 class='title'>Så Här Går Det Till</h1>
  <div class='leftCol'>
    <div class='col col1'>
      <div class='text-box'>
      <h3>HUR?</h3>
      <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
    </div>
    </div>
    <div class='col col2'>
      <div class='text-box'>
      <h3>HUR?</h3>
      <p>Spicy jalapeno bacon ipsum dolor amet ad strip steak consectetur, officia ut culpa pig ground round porchetta capicola quis duis dolore. Capicola minim pancetta do pariatur. Ea anim exercitation consectetur venison bresaola.</p>
    </div>
    </div>
    </div>
    <div class='rightCol'>
    <div class='col col3'>
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

.information {
  display: flex;
  margin-top: 2em;
  margin-bottom: 5em;
}
.information h1 {

}
.infoCol1 {
  flex: 1;
  padding: 2em;
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
  padding: 2em;

}
.infoCol2 h1 {
  font-size: 2em;
  font-weight: bold;
}
.border {
    border: 2px solid #30ed72;
}
.boxes {
  display: flex;
  flex-direction: column;
  background-color: #30ed72;
  margin-bottom: 5em;
}
.boxes h1 {
  color: white;
  text-align: center;
  padding: 1em;
}
.leftCol {
  display: flex;
  justify-content: center;
  margin: 1em;
}
.rightCol {
  display: flex;
  justify-content: center;
  margin: 1em;
}
.col {
  background-color: white;
}
.col1 {
  align-self: flex-start;
  width: 30%;
  margin-right: 1em;
  padding: 1em;
}
.col2 {
  align-self: flex-start;
  width: 30%;
  padding: 1em;
  margin-right: 1em;
}
.col3 {
  align-self: flex-end;
  width: 30%;
  padding: 1em;
  margin-right: 1em;
}
.col4 {
  align-self: flex-end;
  width: 30%;
  padding: 1em;
  margin-left: 1em;
}
.text-box {
  padding: 1em;
}
.text-box h3 {
  font-weight: bold;
}
</style>
