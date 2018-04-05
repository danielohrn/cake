<template>
  <section class="section">
    <div class="columns">
      <div class="column is-one-fifth" v-for="role in roles">
        <div @click="filter(role.url)" class="role" :style="{backgroundColor: role.color}">
          <div class="flex-item">
            <h2 class="title is-2">{{role.name}}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Home',
  data () {
    return {
      roles: [
  {
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
  }
]
    }
  },
  methods: {
    filter(role){
      this.$router.push('/articles' + role )
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.columns {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.column {

}
.role {

  display: flex;
  height: 280px;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.flex-item {
  position: relative;
}
h1, h2 {
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
